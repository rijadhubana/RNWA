<?php
  class Artiste  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $artisteID;
    public $artisteName;
    public $artisteNationality;


    public function __construct($artisteID,$artisteName, $artisteNationality) {
      $this->artisteID      = $artisteID;
      $this->artisteName      = $artisteName;
      $this->artisteNationality      = $artisteNationality;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM artiste');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $art) {
        $list[] = new Artiste($art['artisteID'], $art['artisteName'], $art['artisteNationality']);
      }

      return $list;
    }

    public static function find($art) {
      $db = Db::getInstance();
      $art = intval($art);
      $req = $db->query("SELECT * FROM artiste WHERE artisteID = '$art'");
      $artistedetails = $req->fetch();

      return new Artiste($artistedetails['artisteID'], $artistedetails['artisteName'], $artistedetails['artisteNationality']);
    }

    public static function insertartiste($artisteID,$artisteName,$artisteNationality) {
      $db = Db::getInstance();
      $artisteID = intval($artisteID);
      $sql="INSERT INTO artiste (artisteID, artisteName, artisteNationality)
      VALUES ('$artisteID', '$artisteName', '$artisteNationality')";
      $db->query($sql);
    }

    public static function updateartiste($art,$artisteName,$artisteNationality) {
      $db = Db::getInstance();
      $art = intval($art);
      $sql="UPDATE artiste SET artisteName = '$artisteName', artisteNationality='$artisteNationality'
       WHERE artisteID = '$art'";
      $db->query($sql);
    }

  	public static function deleteartiste($art) {
      $db = Db::getInstance();
      $sql="DELETE FROM artiste WHERE artisteID = '$art'";
	    $db->query($sql);
		}
  }
?>
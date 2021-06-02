<?php
  class ArtisteBand  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $artiste_bandID;
    public $bandRole;
    public $a_artisteID;
    public $b_bandID;


    public function __construct($artiste_bandID,$bandRole, $a_artisteID, $b_bandID) {
      $this->artiste_bandID      = $artiste_bandID;
      $this->bandRole      = $bandRole;
      $this->a_artisteID      = $a_artisteID;
      $this->b_bandID      = $b_bandID;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM artiste_band');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $ab) {
        $list[] = new ArtisteBand($ab['artiste_bandID'], $ab['bandRole'], $ab['a_artisteID'], $ab['b_bandID']);
      }

      return $list;
    }

    public static function find($ab) {
      $db = Db::getInstance();
      $ab = intval($ab);
      $req = $db->prepare('SELECT * FROM artiste_band WHERE artiste_bandID = :ab');
      $req->execute(array('ab' => $ab));
      $artistebandDetails = $req->fetch();

      return new ArtisteBand($artistebandDetails['artiste_bandID'],$artistebandDetails['bandRole'], $artistebandDetails['a_artisteID'], $artistebandDetails['b_bandID']);
    }

    public static function insertartisteband($artiste_bandID,$bandRole,$a_artisteID,$b_bandID) {
      $db = Db::getInstance();
      $artiste_bandID = intval($artiste_bandID);
      $a_artisteID = intval($a_artisteID);
      $b_bandID = intval($b_bandID);
      $sql="INSERT INTO artiste_band (artiste_bandID, bandRole, a_artisteID, b_bandID)
      VALUES ('$artiste_bandID', '$bandRole', '$a_artisteID', '$b_bandID')";
      $db->query($sql);
    }

    public static function updateartisteband($artiste_bandID,$bandRole,$a_artisteID,$b_bandID) {
      $db = Db::getInstance();
      $artiste_bandID = intval($artiste_bandID);
      $a_artisteID = intval($a_artisteID);
      $b_bandID = intval($b_bandID);
      $sql="UPDATE artiste_band SET bandRole = '$bandRole', a_artisteID='$a_artisteID', b_bandID = '$b_bandID'
       WHERE artiste_bandID = '$artiste_bandID'";
      $db->query($sql);
    }

  	public static function deleteartisteband($ab) {
      $db = Db::getInstance();
      $sql="DELETE FROM artiste_band WHERE artiste_bandID = '$ab'";
	    $db->query($sql);
		}
  }
?>
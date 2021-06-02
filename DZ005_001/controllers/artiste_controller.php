<?php
  class ArtisteController {
    public function index() {
      // we store all the posts in a variable
      $artiste = Artiste::all();
      require_once('views/artiste/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/artiste/insert.php');
    }

    public function insertartiste()
    {
      Artiste::insertartiste($_POST['artisteID'],$_POST['artisteName'],$_POST['artisteNationality']);
     return call('artiste', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['art']))
          return call('pages', 'error');
    $artistedetails = Artiste::find($_GET['art']);
    require_once('views/artiste/update.php');
  }

  public function updateartiste()
  {
    if (!isset($_POST['art']))
      return call('pages', 'error');
   Artiste::updateartiste($_POST['art'],$_POST['artisteName'],$_POST['artisteNationality']);
   return call('artiste', 'index');
  }

	public function delete() {
      if (!isset($_GET['art']))
        return call('pages', 'error');
      Artiste::deleteartiste($_GET['art']);
      return call('artiste', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['art']))
          return call('pages', 'error');
          require_once('views/artiste/delete.php');
      }
  }
 ?>
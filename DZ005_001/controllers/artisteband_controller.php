<?php
  class ArtisteBandController {
    public function index() {
      // we store all the posts in a variable
      $artisteband = ArtisteBand::all();
      require_once('views/artisteband/index.php');
    }
  
    public function verifyinsert(){
      require_once('views/artisteband/insert.php');
    }

    public function insertartisteband()
    {
      ArtisteBand::insertartisteband($_POST['artiste_bandID'],$_POST['bandRole'],$_POST['a_artisteID'],$_POST['b_bandID']);
     return call('artisteband', 'index');
    }
  
  public function verifyupdate()
  {
    if (!isset($_GET['ab']))
          return call('pages', 'error');
    $artistebanddetails = ArtisteBand::find($_GET['ab']);
    require_once('views/artisteband/update.php');
  }

  public function updateartisteband()
  {
    if (!isset($_POST['artiste_bandID']))
      return call('pages', 'error');
   ArtisteBand::updateartisteband($_POST['artiste_bandID'],$_POST['bandRole'],$_POST['a_artisteID'],$_POST['b_bandID']);
   return call('artisteband', 'index');
  }

	public function delete() {
      if (!isset($_GET['ab']))
        return call('pages', 'error');
      ArtisteBand::deleteartisteband($_GET['ab']);
      return call('artisteband', 'index');
    }

    public function verifydelete(){
      if (!isset($_GET['ab']))
          return call('pages', 'error');
          require_once('views/artisteband/delete.php');
      }
  }
 ?>
<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	    case 'artiste':
        require_once('models/artiste.php');
		$controller = new ArtisteController();
      break;
      case 'artisteband':
        require_once('models/artisteband.php');
		$controller = new ArtisteBandController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
                       'artiste' 	=> ['index','verifyinsert','insertartiste','verifyupdate','updateartiste','delete','verifydelete'],
                       'artisteband' 	=> ['index','verifyinsert','insertartisteband','verifyupdate','updateartisteband','delete','verifydelete']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
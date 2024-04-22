<?php
  require_once 'controller/UserController.php';
  $user_controller = new UserController();
  switch ($_SERVER("REQUEST_METHOD")) {
    case 'POST':
      $user_controller->login();
      break;
    default:
      echo "non";
      break;
  }
?>
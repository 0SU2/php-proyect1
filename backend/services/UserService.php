<?php

  require_once '../models/User.php';
  require_once '../db/Database.php';
  require_once '../interfaces/UserInterface.php';
  
  class UserService implements UserInterface { 
    private $db;

    public function __construct ($db) {
      $this->db = $db;
    } 

    public function registrarUsuario($usuario) {
      $nombre = $usuario->getNombre();
      $apaterno = $usuario->getApaterno();
      $amaterno = $usuario->getAmaterno();
      $direccion = $usuario->getDireccion();
      $telefono = $usuario->getTelefono();
      $correo = $usuario->getCorreo();
      $username = $usuario->getUsuario();
      $password = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

      $sql_insertar = "INSERT INTO usuario (nombre, apaterno, amaterno, direccion, telefono, correo, usuario, password)
                          VALUES (null, '$nombre', '$apaterno', '$amaterno', '$direccion', '$telefono', '$correo', '$usuario', '$password')";

      if($this->db->query($sql_insertar) === TRUE) {
        return true;
      } else {
        return false;
      }
    }
  }
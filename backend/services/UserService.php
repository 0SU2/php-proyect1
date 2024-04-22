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

      $sql_insertar = "INSERT INTO usuarios (nombre, apaterno, amaterno, direccion, telefono, correo, usuario, password)
                          VALUES (null, '$nombre', '$apaterno', '$amaterno', '$direccion', '$telefono', '$correo', '$usuario', '$password')";

      if($this->db->query($sql_insertar)) {
        return true;
      } else {
        return false;
      }
    }

    public function login($usuario, $password) {
      $sql_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
      $result = $this->db->query($sql_usuario);
      if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user('password'))) {
          return $user;
        }
      }
      return false;
    }

    public function obtenerTodoUsuario() {
      $sql = "SELECT * FROM usuarios";
      $result = $this->db->query($sql);
      // crear una varaible de tipo arreglo
      $users = array();
 
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $users[] = $row;
        }
      }

      return $users;
    }

    public function actualizarUsuario($usuario) {
      $id = $usuario->getId();
      $nombre = $usuario->getNombre();
      $apaterno = $usuario->getApaterno();
      $amaterno = $usuario->getAmaterno();
      $direccion = $usuario->getDireccion();
      $telefono = $usuario->getTelefono();
      $correo = $usuario->getCorreo();
      $username = $usuario->getUsuario(); 
      
      $sql_update = "UPDATE usuarios SET nombre = '$nombre', apaterno = '$apaterno', amaterno = '$direccion', direccion = '$direccion', telefono = '$telefono', correo = '$correo', usuario = '$username'
                      WHERE id = '$id' ";

      if($this->db->query($sql_update)) return True;
      else return False;
    }

    public function borrarUsuario($id) {
      $sql_borrar = "DELETE FROM usuarios WHERE id = '$id' LIMIT 1 ";
      if($this->db->query($sql_borrar)) return True;
      else return False;
    }

    public function obtenerUsuarioPorId($id) {
      $sql = "SELECT * FROM usuarios WHERE id = '$id' ";
      $result = $this->db->query($sql);
 
      if ($result->num_rows == 1) {
        return $result->fetch_assoc();
      }

      return null;
    }

    public function obtenerUsuarioPorCorreo($correo) {
      $sql = "SELECT * FROM usuarios WHERE correo = '$correo' ";
      $result = $this->db->query($sql);
 
      if ($result->num_rows == 1) {
        return $result->fetch_assoc();
      }

      return null;
    }
  }
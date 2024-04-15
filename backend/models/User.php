<?php
  class User {
    private $id;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $direccion;
    private $telefono;
    private $correo;
    private $usuario;
    private $password;
  
    // creacion del constructo de la clase
    public function __contruct($nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password) {
      $this->nombre = $nombre;
      $this->apaterno = $apaterno;    
      $this->amaterno = $amaterno;
      $this->direccion = $direccion;
      $this->telefono = $telefono;
      $this->correo = $correo;
      $this->usuario = $usuario;
      $this->password = $password;
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }
 
    public function getNombre() {
      return $this->nombre;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }
 
    public function getApaterno() {
      return $this->apaterno;
    }

    public function setApaterno($apaterno) {
      $this->apaterno = $apaterno;
    }

    public function getAmaterno() {
      return $this->amaterno;
    }

    public function setAmaterno($amaterno) {
      $this-$amaterno = $amaterno;
    }

    public function getDireccion() {
      return $this->direccion;
    }

    public function setDireccion($direccion) {
      $this-$direccion = $direccion;
    }

    public function getTelefono() {
      return $this->telefono;
    }

    public function setTelefono($telefono) {
      $this-$telefono = $telefono;
    }

    public function getUsuario() {
      return $this->usuario;
    }

    public function setUsuario($usuario) {
      $this-$usuario = $usuario;
    }

    public function getPassword() {
      return $this->password;
    }

    public function setPassword($password) {
      $this-$password = $password;
    }
  }

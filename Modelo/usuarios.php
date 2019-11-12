<?php
//creacion de la clase usuarios
    class usuarios{
        //declaro las variables
        private $numero_documento;
        private $nombre_completo;
        private $apellidos;
        private $contrasena;
        private $tipo_documento;
        private $estado_civil;
        private $ciudad;
        private $depar;
        private $tipo_usuario;
               
        //metodos get de las variables y sus returns
        function getNumero_documento() {
            return $this->numero_documento;
        }

        function getNombre_completo() {
            return $this->nombre_completo;
        }

        function getApellidos() {
            return $this->apellidos;
        }

        function getContrasena() {
            return $this->contrasena;
        }

        function getTipo_documento() {
            return $this->tipo_documento;
        }

        function getEstado_civil() {
            return $this->estado_civil;
        }

        function getCiudad() {
            return $this->ciudad;
        }

        function getDepar() {
            return $this->depar;
        }

        function getTipo_usuario() {
            return $this->tipo_usuario;
        }
        
        //metodos sets de las variables y sus asignaciones
        function setNumero_documento($numero_documento) {
            $this->numero_documento = $numero_documento;
        }

        function setNombre_completo($nombre_completo) {
            $this->nombre_completo = $nombre_completo;
        }

        function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        function setContrasena($contrasena) {
            $this->contrasena = $contrasena;
        }

        function setTipo_documento($tipo_documento) {
            $this->tipo_documento = $tipo_documento;
        }

        function setEstado_civil($estado_civil) {
            $this->estado_civil = $estado_civil;
        }

        function setCiudad($ciudad) {
            $this->ciudad = $ciudad;
        }

        function setDepar($depar) {
            $this->depar = $depar;
        }

        function setTipo_usuario($tipo_usuario) {
            $this->tipo_usuario = $tipo_usuario;
        }

        

    }
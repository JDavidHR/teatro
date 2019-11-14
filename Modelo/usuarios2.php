<?php
//declaracion de la clase
class usuario {
    //atributos
    private $documento;
    private $pass;


    //creacion de metodos donde recibe y captura los datos ingresados para el incio de sesion
    public function __construct(){}
    
    //creacion de metodo
    public function setdocumento($documento){
        $this->documento = $documento;
    }
    
     
   
    
    //creacion de metodo
    public function setpass($pass){
        $this->pass = $pass;
    }
  
    //creacion de metodo
    public function getdocumento(){
        return $this->documento;
    }
    
    
    
   
    //creacion de metodo
    public function getpass(){
        return $this->pass;
    }
   
}
?>

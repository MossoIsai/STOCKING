<?php

class conex {
   private $link;

    //Constructor parametrizado
    public function __construct(){
        $this->link = mysqli_connect(
            "localhost","root","isai.190","STOCK")
        or die("USTED NO ESTA AUTORIZADO PARA ACCEDER");

         return true;
    }
   /* // metodod de ejecucion de los Querys
    public function ejecutaQuery($query){
        $this->query = $query;
        $resultado =  mysqli_query($this->link,$this->query);
        if(!$resultado){
            echo "query Invalido: ". mysqli_error($this->link);
        }
    }*/
    // cerrar sesion
    public function __destruct(){
        mysqli_close($this->link);
    }
    public function  recorre_fila($query){
     $consulta = mysqli_query($this->link,$query);
       mysqli_fetch_row($consulta);

    }

}
?>
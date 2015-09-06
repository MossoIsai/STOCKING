<?php
  /**En esta seccion se encentran ubicadas todas las funcionaes que permiten
  *la operabilida
   *
   */

function baja($valor,$id){
    if($valor == 0){
       return '<a href="controll/change_status.php?id="'.$id.'><span class="glyphicon glyphicon-ok"></a></span>';
    }else if($valor == 1){
        return '<a href="controll/change_status.php?id="'.$id.'<span class="glyphicon glyphicon-remove"></span>';
    }
}
function alta_baja($valor){
    if($valor == 1){
        return '<span class="glyphicon glyphicon-ok"></span>';
    }else if($valor == 0){
        return '<span class="glyphicon glyphicon-remove"></span>';
    }
}
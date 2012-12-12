<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$piriority = $Task->getPiriority();

if($piriority == 0){
    echo "Thường";
}else if($piriority == 1){
    echo "Gấp";
}else if($piriority == 2){
    echo "Khẩn cấp";
}

?>

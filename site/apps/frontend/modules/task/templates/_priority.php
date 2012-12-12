<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$priority = $Task->getPriority() ? $Task->getPriority() : "1";
$arrPriorities = sfConfig::get('app_task_prioryties', 
    array(1 => 'Không gấp', 2 => 'Bình thường', 3 => 'Cần sớm', 4 => 'Gấp', 5 => 'Khẩn cấp'));

echo $arrPriorities[$priority];

if($priority == 0){
    echo "Thường";
}else if($priority == 1){
    echo "Gấp";
}else if($priority == 2){
    echo "Khẩn cấp";
}

?>

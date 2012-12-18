<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$completedAt = $Task->getCompletedAt();

if($completedAt){
    echo "<font color='blue';>Hoàn thành</font>";
}else{
    echo "<font color='red';>Đang thực hiện!</font>";
}

?>

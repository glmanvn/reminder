<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$completedAt = $Task->getCompletedAt();

if($completedAt){
    echo "<font color='blue';>Đã hoàn thành lúc: [" . $completedAt . "] bởi " . $Task->getCompletedBy() . "</font>";
}else{
    echo "<strong><font color='red';>Chưa hoàn thành!</font></strong>";
}

?>

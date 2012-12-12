<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$priority = $Task->getPriority() ? $Task->getPriority() : "1";

echo $Task->getUser()->getFirstName() . ' ' . $Task->getUser()->getLastName();

?>

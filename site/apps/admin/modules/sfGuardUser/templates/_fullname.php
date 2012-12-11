<?php
/* 
 * Show list of user's type (admin, buyer or seller)
 * 
 */
echo ($sf_guard_user->getFirstName() . ' ' . $sf_guard_user->getLastName());

?>
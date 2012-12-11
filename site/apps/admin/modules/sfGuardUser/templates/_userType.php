<?php
/* 
 * Show list of user's type (admin, buyer or seller)
 * 
 */
$isAdmin = $sf_guard_user->getIsSuperAdmin();
if($isAdmin){
    echo "Admin";
}else{
    echo "Non-admin";
}
?>
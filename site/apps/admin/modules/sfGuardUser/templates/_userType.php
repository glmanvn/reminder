<?php
/* 
 * Show list of user's type (admin, buyer or seller)
 * 
 */
$isAdmin = $sf_guard_user->getIsSuperAdmin();
if($isAdmin){
    echo "Admin";
}else{
    $profile = $sf_guard_user->getProfile();
    if($profile->getShopName() != ""){
        echo "Seller";
    }else{
        echo "Buyer";
    }
}
?>
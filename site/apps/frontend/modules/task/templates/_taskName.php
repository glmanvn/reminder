<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$isAdmin = $sf_user->getGuardUser()->getIsSuperAdmin();
?>

<?php if($isAdmin){ ?>
<a href="<?php echo url_for('task/edit?id=' . $Task->getId()) ?>" >
    <?php echo $Task->getTaskName();?>
</a>
<?php }else{ ?>
<a href="<?php echo url_for('task/viewComment') . '?id=' . $Task->getId() ?>" >
    <?php echo $Task->getTaskName();?>
</a>
<?php } ?>





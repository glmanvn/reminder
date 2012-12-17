<?php
/* @var $form UserUpdateForm */
?>
<!--
<?php if ($sf_user->hasFlash('success')): ?>
<div class="success">
  <?php echo $sf_user->getFlash('success') ?>
</div>
<?php endif ?>
-->

<form action="<?php echo url_for('user/update') ?>" method="post">

  <h2>Edit My Details</h2>
  <?php echo $form['_csrf_token']->render()?>
  
  <?php echo $form['first_name']->renderRow() ?>
  <?php echo $form['last_name']->renderRow() ?>
  <?php echo $form['shop_name']->renderRow() ?>
  <?php echo $form['shop_name']->renderHelp() ?>
  <?php echo $form['paypal_account']->renderRow() ?>
  <?php echo $form['receive_newsletter']->renderRow() ?>
  
  <?php echo $form['street']->renderRow() ?>
  <?php echo $form['city']->renderRow() ?>
  <?php echo $form['state']->renderRow() ?>
  <?php echo $form['zip']->renderRow() ?>
  <?php echo $form['country']->renderRow() ?>
  <?php echo $form['phone']->renderRow() ?>

  <div style="padding-top:20px;">
    <input type="submit" class="button medium green" value="Save" />
  </div>

</form>



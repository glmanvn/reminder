<?php use_helper('I18N') ?>

<div style="margin-left: 340px; margin-top:40px;">
  <h1><?php echo __('Please Login', null, 'sf_guard') ?></h1>

  <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
</div>

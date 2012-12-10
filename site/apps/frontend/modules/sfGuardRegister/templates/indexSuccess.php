<?php use_helper('I18N') ?>

<div>
  <?php echo $static_page->getPageContent(ESC_RAW) ?>
</div>
<?php /*
<?php include_partial('global/fb_connect') ?>
<h4>or complete the following form:</h4>
 */ ?>
<?php echo get_partial('sfGuardRegister/form', array('form' => $form)) ?>


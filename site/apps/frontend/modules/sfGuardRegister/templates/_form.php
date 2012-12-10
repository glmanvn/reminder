<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_register') ?>"
      method="post" autocomplete="off">
  <?php echo $form ?>
  <div class="buttons">
    <input type="submit"
           name="register"
           class="btn-orange"
           value="<?php echo __('Register', null, 'sf_guard') ?>" />
  </div>
</form>


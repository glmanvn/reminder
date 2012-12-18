<?php use_helper('I18N', 'Date') ?>
<?php include_partial('dashboard/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Thêm mới yêu cầu công việc', array(), 'messages') ?></h1>

  <?php include_partial('dashboard/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('dashboard/form_header', array('Task' => $Task, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('dashboard/form', array('Task' => $Task, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('dashboard/form_footer', array('Task' => $Task, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

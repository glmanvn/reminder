<?php use_helper('I18N', 'Date') ?>
<?php include_partial('task/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Danh sách công việc', array(), 'messages') ?></h1>

  <?php include_partial('task/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('task/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('task/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('task/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('task/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('task/list_footer', array('pager' => $pager)) ?>
  </div>
</div>

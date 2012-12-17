<td>
  <ul class="sf_admin_td_actions">
    <?php if ($sf_user->hasCredential('admin')): ?>
<?php echo $helper->linkToEdit($Task, array(  'label' => 'Sửa',  'credentials' => 'admin',  'params' =>   array(  ),  'class_suffix' => 'edit',)) ?>
<?php endif; ?>

    <li class="sf_admin_action_viewcomment">
      <?php echo link_to(__('Xem', array(), 'messages'), 'task/viewComment?id='.$Task->getId(), array()) ?>
    </li>
  </ul>
</td>

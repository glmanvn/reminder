<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($Task, array(  'label' => 'Sửa',  'params' =>   array(  ),  'class_suffix' => 'edit',)) ?>
    <li class="sf_admin_action_viewcomment">
      <?php echo link_to(__('Xem', array(), 'messages'), 'task/viewComment?id='.$Task->getId(), array()) ?>
    </li>
  </ul>
</td>

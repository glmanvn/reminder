<td class="sf_admin_text sf_admin_list_td_task_name">
  <?php echo link_to($Task->getTaskName(), 'task_edit', $Task) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_createdBy">
  <?php echo get_partial('task/createdBy', array('type' => 'list', 'Task' => $Task)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_task_description">
  <?php echo $Task->getTaskDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_priority">
  <?php echo get_partial('task/priority', array('type' => 'list', 'Task' => $Task)) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Task->getCreatedAt()) ? format_date($Task->getCreatedAt(), "yyyy/MM/dd hh:mm:ss") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_assigned_to">
  <?php echo $Task->getAssignedTo() ?>
</td>

<td class="sf_admin_text sf_admin_list_td_task_name">
  <?php echo link_to($Task->getTaskName(), 'task_edit', $Task) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $Task->getUserId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_task_description">
  <?php echo $Task->getTaskDescription() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Task->getCreatedAt()) ? format_date($Task->getCreatedAt(), "yyyy/MM/dd hh:mm:ss") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_assigned_to">
  <?php echo $Task->getAssignedTo() ?>
</td>

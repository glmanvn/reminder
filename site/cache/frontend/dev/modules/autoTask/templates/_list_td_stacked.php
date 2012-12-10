<td colspan="5">
  <?php echo __('%%task_name%% - %%user_id%% - %%task_description%% - %%created_at%% - %%assigned_to%%', array('%%task_name%%' => link_to($Task->getTaskName(), 'task_edit', $Task), '%%user_id%%' => $Task->getUserId(), '%%task_description%%' => $Task->getTaskDescription(), '%%created_at%%' => false !== strtotime($Task->getCreatedAt()) ? format_date($Task->getCreatedAt(), "yyyy/MM/dd hh:mm:ss") : '&nbsp;', '%%assigned_to%%' => $Task->getAssignedTo()), 'messages') ?>
</td>

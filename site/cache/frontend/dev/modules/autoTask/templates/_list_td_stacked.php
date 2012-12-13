<td colspan="5">
  <?php echo __('%%task_name%% - %%createdBy%% - %%priority%% - %%created_at%% - %%assigned_to%%', array('%%task_name%%' => link_to($Task->getTaskName(), 'task_edit', $Task), '%%createdBy%%' => get_partial('task/createdBy', array('type' => 'list', 'Task' => $Task)), '%%priority%%' => get_partial('task/priority', array('type' => 'list', 'Task' => $Task)), '%%created_at%%' => false !== strtotime($Task->getCreatedAt()) ? format_date($Task->getCreatedAt(), "yyyy/MM/dd hh:mm:ss") : '&nbsp;', '%%assigned_to%%' => $Task->getAssignedTo()), 'messages') ?>
</td>

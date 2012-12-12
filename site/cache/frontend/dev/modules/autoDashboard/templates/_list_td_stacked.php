<td colspan="2">
  <?php echo __('%%taskIcon%% - %%taskOverview%%', array('%%taskIcon%%' => get_partial('dashboard/taskIcon', array('type' => 'list', 'Task' => $Task)), '%%taskOverview%%' => get_partial('dashboard/taskOverview', array('type' => 'list', 'Task' => $Task))), 'messages') ?>
</td>

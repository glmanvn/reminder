<td colspan="6">
  <?php echo __('%%username%% - %%email_address%% - %%userType%% - %%created_at%% - %%updated_at%% - %%last_login%%', array('%%username%%' => link_to($sf_guard_user->getUsername(), 'sf_guard_user_edit', $sf_guard_user), '%%email_address%%' => $sf_guard_user->getEmailAddress(), '%%userType%%' => get_partial('sfGuardUser/userType', array('type' => 'list', 'sf_guard_user' => $sf_guard_user)), '%%created_at%%' => false !== strtotime($sf_guard_user->getCreatedAt()) ? format_date($sf_guard_user->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($sf_guard_user->getUpdatedAt()) ? format_date($sf_guard_user->getUpdatedAt(), "f") : '&nbsp;', '%%last_login%%' => false !== strtotime($sf_guard_user->getLastLogin()) ? format_date($sf_guard_user->getLastLogin(), "f") : '&nbsp;'), 'messages') ?>
</td>

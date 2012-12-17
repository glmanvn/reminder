<script lang="javascript">
    function changePassword(){
        var msg = confirm('Do you want to request for password reset?');
        return msg;
    }
</script>    
<form action="" method="post" class="userForm changePassword">
  <h3>Change password</h3>

  <?php if (isset($success) and $success): ?>
    <div class="success">
      New password is set for your account
    </div>
  <?php endif ?>
  
  <?php echo $form; ?>
  
  <div style="padding-top:20px;">
      <input type="submit" class="inline" onclick="return changePassword();" value="Change Password" />
  </div>
</form>
<script lang="javascript">
    // open dialog
    function selectUser(userId, userName)
    {
        $('#<?php echo ?>).dialog('open');
    }
    
    // page load
    $(function() {
        $( "#divSelectUser" ).dialog({
            height: 600,
            width: 600,
            modal: true,
            autoOpen: false,
            buttons: {
                "Thoát": function() {
                    $(this).dialog("close");
                }
            }
        });
    });
    
</script>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="grid_12">
    <div id="sf_admin_container">
        <h1>CHỌN MỘT NGƯỜI SỬ DỤNG</h1>
        <div id="sf_admin_header"></div>

        <div id="sf_admin_content">
            <div class="sf_admin_list">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Họ và Tên</th>
                            <th>Email address</th>
                            <th>Ngày login</th>
                            <th>Chọn</th>
                        </tr>
                    </thead>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->getUsername(); ?></td>
                            <td><?php echo $user->getFirstName() . ' ' . $user->getLastName(); ?></td>
                            <td><?php echo $user->getEmailAddress(); ?></td>
                            <td><?php echo $user->getLastLogin(); ?></td>
                            <td><input id="btSelect" type="button" class="btn-orange" value="Chọn" /></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>

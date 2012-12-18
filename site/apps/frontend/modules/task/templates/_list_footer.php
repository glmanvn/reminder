<script lang="javascript">
    // open dialog
    function openUserDialog()
    {
        $('#divSelectUser').dialog('open');
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

<div id="divSelectUser" title="CHUYỂN GIAO CÔNG VIỆC">
    <?php include_component('user', 'selectOneUser', array('field1' => 'userId', 'field2' => 'userName')); ?>
</div>

<div>
    <form>
        
        
    </form>
</div>
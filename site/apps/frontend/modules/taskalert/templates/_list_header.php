<script lang="javascript">
    // open dialog
    function openExtendDl(taskId, afterMinutes)
    {
        $('#taskId').val(taskId);
        $('#txtAfterMinutes').val(afterMinutes);
        
        $('#dlExtendTask').dialog('open');
    }
    // open dialog
    function openCompleteDl(taskId, txtCompletedBy)
    {
        $('#taskId').val(taskId);
        $('#txtCompletedBy').val(txtCompletedBy);
        $('#dlCompleteTask').dialog('open');
    }
    // page load
    $(function() {
        $( "#dlExtendTask" ).dialog({
            height: 170,
            width: 600,
            modal: true,
            autoOpen: false,
            buttons: {
                "Thoát": function() {
                    $(this).dialog("close");
                }
            }
        });
        
        $( "#dlCompleteTask" ).dialog({
            height: 160,
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
    
    // Extend task reminder
    function extendTask()
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo url_for('task/extend') ?>',
            dataType: 'json',
            async: false,
            cache: false,
            data:{
                taskId: $('#taskId').val(),
                afterMin: $('#txtAfterMinutes').val()
            },
            success: function(data){
                $return = eval(data);
                if($return.status == 'success')
                {
                    document.location.reload();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                //return false;
            }
        });
    }
    
    // Complete task 
    function completeTask()
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo url_for('task/completed') ?>',
            dataType: 'json',
            async: false,
            cache: false,
            data:{
                taskId: $('#taskId').val(),
                completedBy: $('#txtCompletedBy').val()
            },
            success: function(data){
                $return = eval(data);
                if($return.status == 'success')
                {
                    document.location.reload();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                //return false;
            }
        });
    }
    
</script>

<div id="dlExtendTask" title="GIA HẠN CÔNG VIỆC">
    <p>Gia hạn xử lý công việc này. Hệ thống sẽ cảnh báo lại sau khoảng thời gian: </P>
    <form>
        <div>
            <input type="hidden" id="taskId" />
            <input type="text" id="txtAfterMinutes" style="text-align: center;" /> &nbsp;(phút - nhập số)&nbsp;&nbsp;
            <input type="button" value="Gia hạn" onclick="extendTask();" />
        </div>
    </form>
</div>

<div id="dlCompleteTask" title="HOÀN THÀNH CÔNG VIỆC">
    <p>Xác nhận khi đã hoàn thành công việc này. Công việc được hoàn thành bởi:</p>
    <form>
        <div>
            <input type="hidden" id="taskId" />
            <input type="text" id="txtCompletedBy" /> &nbsp;&nbsp;
            <input type="button" value="Hoàn thành" onclick="completeTask();" />
        </div>
    </form>
</div>
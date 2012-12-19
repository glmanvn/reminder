<script lang="javascript">
    $(function() {
        $( "#createdFrom" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onSelect: function( selectedDate ) {
                $( "#createdTo" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#createdTo" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onSelect: function( selectedDate ) {
                $( "#createdFrom" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        
        $( "#createdFrom" ).datepicker( "option", "dateFormat", 'yy-mm-dd');
        $( "#createdFrom" ).datepicker("setDate", '<?php echo $createdFrom; ?>');
        $( "#createdTo" ).datepicker( "option", "dateFormat", 'yy-mm-dd');
    });
</script>

<form action="<?php echo url_for('report/index') ?>" method="post" 
      enctype="multipart/form-data">
    <div class="grid_12">
        <div id="sf_admin_container">
            <div id="sf_admin_content">
                <div class="sf_admin_form">
                    <fieldset id="sf_fieldset_none">
                        <div class="sf_admin_form_row">
                            <label id="bold">Người tạo</label>
                            <div class="content">
                                <input type="text" id="userName" name="userName" value="<?php echo $userName; ?>" />
                            </div>
                        </div>
                        <div class="sf_admin_form_row">
                            <label id="bold">Ngày tạo</label>
                            <div class="content">
                                <input type="text" id="createdFrom" name="createdFrom" readonly="readonly" style="width: 150px" />
                                ~
                                <input type="text" id="createdTo" name="createdTo" readonly="readonly" style="width: 150px"/>
                            </div>
                        </div>
                        <div class="sf_admin_form_row">
                            <label id="bold">Trạng thái</label>
                            <div class="content" style="width: 100%; white-space: nowrap;">
                                <input type="radio" id="taskStatus" name="taskStatus" value="-1" 
                                       <?php if ($taskStatus == '-1') echo "checked='checked';" ?> />Tất cả &nbsp;
                                <input type="radio" id="taskStatus" name="taskStatus" value="1" 
                                       <?php if ($taskStatus == 1) echo "checked='checked';"; ?> />Hoàn thành &nbsp;
                                <input type="radio" id="taskStatus" name="taskStatus" value="0" 
                                       <?php if ($taskStatus == 0) echo "checked='checked';"; ?> />Chưa hoàn thành &nbsp;
                            </div>
                        </div>
                        <div class="sf_admin_form_row">
                            <input type="submit" value="Báo cáo" />
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</form>
<hr/>
<div class="grid_12">
    <div id="sf_admin_container">
        <div id="sf_admin_header"><h3>BÁO CÁO CÔNG VIỆC</h3></div>

        <div id="sf_admin_content">
            <div class="sf_admin_list">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Tên công việc</th>
                            <th style="width: 10%;">Người tạo</th>
                            <th style="width: 5%;">Trạng thái</th>
                            <th style="width: 65%;">Mô tả</th>
                        </tr>
                    </thead>
                    <?php foreach ($pager->getResults() as $task): /* @var $task Task */ ?>
                        <tr>
                            <td style="white-space: nowrap;font-weight: bold;">
                                <?php echo $task->getTaskName(); ?></td>
                            <td style="white-space: nowrap;">
                                <?php include_partial("createdBy", array('Task' => $task)); ?> 
                            </td>
                            <td style="white-space: nowrap;">
                                <?php include_partial("statusMin", array('Task' => $task)); ?> 
                            </td>
                            <td>
                                <?php echo $task->getTaskDescription(); ?>
                                <?php $taskComments = $task->getTaskComments(); ?>
                                <?php if (sizeof($taskComments) > 0) { ?> <div><strong>TT bổ sung:</strong></div> <?php } ?>
                                <?php foreach ($taskComments as $comment): ?>
                                    <?php if ($comment) { ?>
                                        <div style="padding-left: 10px;"> 
                                            <strong><?php echo $comment->getUser()->getFirstName() . " " . $comment->getUser()->getLastName(); ?> </strong>
                                            [<?php echo $comment->getCreatedAt(); ?>] viết: 
                                            <?php echo $comment->getComment(); ?>
                                        </div>
                                    <?php } ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php
            include_partial('global/pagerNav', array(
                'pager' => $pager,
                'method' => 'get',
                'module' => 'report',
                'action' => 'index',
                'url' => '?userName=' . $userName . '&taskStatus=' . $taskStatus . '&createdFrom='.$createdFrom.'&createdTo='.$createdTo.'&',
            ))
            ?>
        </div>
    </div>

</div>

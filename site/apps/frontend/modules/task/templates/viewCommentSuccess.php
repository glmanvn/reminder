<div id="sf_admin_container">
    <h1>Xem yêu cầu công việc: <?php echo $task->getTaskName(); ?></h1>

    <div id="sf_admin_header"></div>

    <div id="sf_admin_content">

        <div class="sf_admin_form">
            <fieldset id="sf_fieldset_none">
                <div class="sf_admin_form_row">
                    <label id="bold">Tên công việc</label>
                    <div class="content"><?php echo $task->getTaskName(); ?></div>
                </div>
                <div class="sf_admin_form_row">
                    <label id="bold">Mô tả</label>
                    <div class="content"><?php echo $task->getTaskDescription(); ?></div>
                </div>
                <div class="sf_admin_form_row">
                    <label id="bold">Người tạo</label>
                    <div class="content">
                        <?php include_partial("createdBy", array('Task' => $task)); ?> 
                        [at: <?php echo $task->getCreatedAt(); ?>]
                    </div>
                </div>
                <div class="sf_admin_form_row">
                    <label id="bold">Người xử lý</label>
                    <div class="content"><?php echo $task->getAssignedTo(); ?></div>
                </div>
                <div class="sf_admin_form_row">
                    <label id="bold">Độ ưu tiên</label>
                    <div class="content">
                        <?php include_partial("priority", array('Task' => $task)); ?> 
                    </div>
                </div>
                <div class="sf_admin_form_row">
                    <label id="bold">Trạng thái</label>
                    <div class="content">
                        <?php include_partial("status", array('Task' => $task)); ?> 
                    </div>
                </div>
                <div class="sf_admin_form_row">
                    <label id="bold">Nhắc việc lần 1</label>
                    <div class="content"><?php echo $task->remind_1st_at ? $task->remind_1st_at : "&nbsp;"; ?></div>
                </div>
                <?php if ($task->remind_2rd_at) { ?>
                    <div class="sf_admin_form_row">
                        <label id="bold">Nhắc việc lần 2</label>
                        <div class="content">
                            <?php echo $task->remind_2rd_at ? $task->remind_2rd_at : "&nbsp;"; ?>
                            <?php echo $task->getReminderEmail1() ? " - email to: " . $task->getReminderEmail1() : "&nbsp;"; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($task->remind_3th_at) { ?>
                    <div class="sf_admin_form_row">
                        <label id="bold">Nhắc việc lần 3</label>
                        <div class="content">
                            <?php echo $task->remind_3th_at ? $task->remind_3th_at : "&nbsp;"; ?>
                            <?php echo $task->getReminderEmail2() ? " - email to: " . $task->getReminderEmail1() . ', ' . $task->getReminderEmail2() : "&nbsp;"; ?>
                        </div>
                    </div>
                <?php } ?>
            </fieldset>
            <fieldset id="sf_fieldset_none">
                <div class="sf_admin_form_row">
                    <h4>Thông tin bổ sung</h4>
                </div>
                <?php foreach ($taskComments as $comment): ?>
                    <?php if ($comment) { ?>
                        <div class="sf_admin_form_row">
                            <div> 
                                <strong><?php echo $comment->getUser()->getFirstName() . " " . $comment->getUser()->getLastName(); ?> </strong>
                                [<?php echo $comment->getCreatedAt(); ?>] viết: 
                            </div>
                            <div style="padding: 10px;"><?php echo $comment->getComment(); ?></div>
                        </div>
                    <?php } ?>
                <?php endforeach ?>
                <form action="<?php echo url_for('task/addComment') ?>"  method="post" 
                    enctype="multipart/form-data">
                    <input type="hidden" id="taskId" name="taskId" value="<?php echo $task->getId();?>" />
                    <div class="sf_admin_form_row">
                        <div> 
                            <label id="bold">Bổ sung:</label>
                        </div>
                        <div class="content">
                            <textarea id="taskComment" name="taskComment" cols="100" rows="3" ></textarea>
                        </div>
                        <div class="content" style="padding-top: 5px;">
                            <input id="btSave" type="submit" class="btn-orange" value="Ghi thông tin bổ sung" />
                        </div>
                    </div>
                </form>
        </div>
        </fieldset>
    </div>
</div>
</div>
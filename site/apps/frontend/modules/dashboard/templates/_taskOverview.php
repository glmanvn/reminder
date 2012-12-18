<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$priority = $Task->getPriority() ? $Task->getPriority() : "1";

$arrPriorities = sfConfig::get('app_task_prioryties', 
    array(1 => 'Không gấp', 2 => 'Bình thường', 3 => 'Cần sớm', 4 => 'Gấp', 5 => 'Khẩn cấp'));

$completedAt = $Task->getCompletedAt();
$taskStatus = "";
if ($completedAt) {
    $taskStatus = "<font color='blue';>Hoàn thành lúc [" . $completedAt . "] bởi " . $Task->getCompletedBy() . "</font>";
} else {
    $taskStatus = "<strong><font color='red';>Chưa hoàn thành!</font></strong>";
}
?>
<div class="grid_12">
    <div class="grid_2" style="padding-left: 0px; margin: 0;">
        <img src="/images/stars/star_<?php echo $priority; ?>.png" alt="<?php echo $arrPriorities[$priority]; ?>" />
    </div>
    <div class="grid_7">
        <h5><p style="padding-top: 10px; font-weight: bold;">
                <a href="<?php echo url_for('task/viewComment') . '?id=' . $Task->getId() ?>" >
                    <?php echo $Task->getTaskName(); ?>
                </a>
            </p></h5>
    </div>
    <div class="grid_3">
        <p style="padding-top: 10px;"><strong>Thực hiện:</strong> <?php echo $Task->getAssignedTo(); ?></p>
    </div>
</div>
<div class="grid_12">
    <?php echo $Task->getTaskDescription(); ?>
</div>
<div class="clearfix">&nbsp;</div>
<div class="grid_12" style="padding-bottom: 3px;">
    <div class="grid_5" style="padding-left: 0px; margin: 0;">
        <div class="content">
            <strong>Remind 1st:</strong> &nbsp;
            <?php echo $Task->remind_1st_at ? $Task->remind_1st_at : "&nbsp;"; ?>
        </div>
    </div>
    <div class="grid_4">
        <div class="content">
            <strong>Remind 2rd: </strong>&nbsp;
            <?php echo $Task->remind_2rd_at ? $Task->remind_2rd_at : "&nbsp;"; ?>
        </div>
    </div>
    <div class="grid_3">
        <div class="content">
            <strong>Remind 3th: </strong>&nbsp;
            <?php echo $Task->remind_3th_at ? $Task->remind_3th_at : "&nbsp;"; ?>
        </div>
    </div>
</div>
<hr style="width: 99%; margin: 0;">
<div class="grid_12" style="padding: 5px 5px 5px 0px;">
    <div class="grid_8" style="padding-left: 0px; margin: 0;">
        <div>
            <strong>Trạng thái: </strong>&nbsp;<?php echo $taskStatus; ?> &nbsp;&nbsp;
            <strong>Ngày tạo: </strong>&nbsp;<?php echo $Task->getCreatedAt(); ?>
        </div>
    </div>
    <div class="grid_4" style="text-align: right;">
        <?php if (!$completedAt): ?>
        <input type="button" value="Gia hạn" onclick="openExtendDl(<?php echo $Task->getId();?>, '10');" />
        <input type="button" value="Hoàn thành" onclick="openCompleteDl(<?php echo $Task->getId();?>, '<?php echo $Task->getAssignedTo();?>');" />
        <?php endif;?>
    </div>
</div>
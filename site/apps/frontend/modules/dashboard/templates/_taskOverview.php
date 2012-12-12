<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$priority = $Task->getPriority() ? $Task->getPriority() : "1";

$arrPriorities = sfConfig::get('app_task_prioryties', array(1 => 'Không gấp', 2 => 'Bình thường', 3 => 'Cần sớm', 4 => 'Gấp', 5 => 'Khẩn cấp'));

$completedAt = $Task->getCompletedAt();
$taskStatus = "";
if ($completedAt) {
    $taskStatus = "<font color='blue';>[" . $completedAt . "] <br> " . $Task->getCompletedBy() . "</font>";
} else {
    $taskStatus = "<strong><font color='red';>Chưa hoàn thành!</font></strong>";
}
?>
<div class="grid_12">
    <div class="grid_2" style="padding-left: 0px; margin: 0;">
        <img src="/images/stars/star_<?php echo $priority; ?>.png" alt="<?php echo $arrPriorities[$priority]; ?>" />
    </div>
    <div class="grid_6">
        <h5><p style="padding-top: 10px; font-weight: bold;"><?php echo $Task->getTaskName(); ?></p></h5>
    </div>
    <div class="grid_2">
        <p style="padding-top: 10px;"><?php echo $Task->getAssignedTo(); ?></p>
    </div>
    <div class="grid_2">
        <p style="padding-top: 10px;"><?php echo $taskStatus; ?></p>
    </div>
</div>
<div class="grid_12">
    <?php echo $Task->getTaskDescription(); ?>
</div>
<div class="clearfix">&nbsp;</div>
<div class="grid_12">
    <div class="grid_4" style="padding-left: 0px; margin: 0;">
        <div class="content">
            <strong>Reminder 1st:</strong> &nbsp;
            <?php echo $Task->remind_1st_at ? $Task->remind_1st_at : "&nbsp;"; ?>
        </div>
    </div>
    <div class="grid_4">
        <div class="content">
            <strong>Reminder 2rd: </strong>&nbsp;
            <?php echo $Task->remind_2rd_at ? $Task->remind_2rd_at : "&nbsp;"; ?>
        </div>
    </div>
    <div class="grid_4">
        <div class="content">
            <strong>Reminder 3th: </strong>&nbsp;
            <?php echo $Task->remind_3th_at ? $Task->remind_3th_at : "&nbsp;"; ?>
        </div>
    </div>
</div>
<hr style="width: 99%;">
<div class="grid_12" style="text-align: right; padding: 0;">
    <input type="button" value="Gia hạn" />
    <input type="button" value="Hoàn thành" />
</div>
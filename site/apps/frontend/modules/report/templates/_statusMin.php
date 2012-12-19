<?php
$completedAt = $Task->getCompletedAt();
if ($completedAt) {
    ?>
    <font color='blue'>Hoàn thành</font><br />
    <?php echo $completedAt; ?>
<?php } else { ?>
    <font color='red'>Đang thực hiện!</font>
<?php } ?>


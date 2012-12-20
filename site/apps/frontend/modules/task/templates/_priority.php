<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$priority = $Task->getPriority() ? $Task->getPriority() : "1";
$arrPriorities = sfConfig::get('app_task_prioryties', 
    array(1 => 'Không gấp', 2 => 'Bình thường', 3 => 'Cần sớm', 4 => 'Gấp', 5 => 'Khẩn cấp'));
?>
<div>
    <img src="/images/stars/star_<?php echo $priority; ?>.png" height="20px;" alt="<?php echo $arrPriorities[$priority]; ?>" />
</div>

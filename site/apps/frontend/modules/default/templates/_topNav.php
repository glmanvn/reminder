<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav>
  <ul class="nav main">
    <li><?php echo link_to('Trang chủ', '@homepage') ?></li>
      <li><?php echo link_to('Công việc', 'task/index') ?></li>
      <li><?php echo link_to('Báo cáo', 'report/index') ?></li>
      <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a></li>
  </ul>
</nav>

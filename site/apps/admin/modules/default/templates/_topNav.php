<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav>
  <ul class="nav main">
    <li><?php echo link_to('Trang chủ', '@homepage') ?></li>
      <li><a href="<?php echo url_for('sfGuardUser/index') ?>">Người sử dụng</a></li>
      <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a></li>
  </ul>
</nav>

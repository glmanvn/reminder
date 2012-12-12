<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav>
    <ul class="nav main">
        <li class="<?php if ($sf_request->getParameter('module') == 'default') echo 'current' ?>">
            <a href="<?php echo url_for('@homepage') ?>">Trang chủ</a>
        </li>
        <li class="<?php if ($sf_request->getParameter('module') == 'task') echo 'current' ?>">
            <a href="<?php echo url_for('task/index') ?>">Công việc</a>
        </li>
        <li class="<?php if ($sf_request->getParameter('module') == 'report') echo 'current' ?>">
            <a href="<?php echo url_for('report/index') ?>">Báo cáo</a>
        </li>
        <li class="<?php if ($sf_request->getParameter('module') == 'signout') echo 'current' ?>" style="float: right;">
            <a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a>
        </li>
    </ul>
</nav>

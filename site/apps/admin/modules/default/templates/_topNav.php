<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav>
    <ul class="nav main">
        <li><?php echo link_to('Trang chủ', '@homepage') ?></li>
        <li class="<?php if ($sf_request->getParameter('module') == 'sfGuardUser') echo 'current' ?>">
            <a href="<?php echo url_for('sfGuardUser/index') ?>">Người sử dụng</a></li>
        
        <li class="<?php if ($sf_request->getParameter('module') == 'signout') echo 'current' ?>" style="float: right;">
            <a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a>
        </li>
        <li style="float: right;">
            <a href="<?php echo url_for('sfGuardUser/edit?id='.$sf_user->getGuardUser()->getId()) ?>">
                [&nbsp;<?php echo $sf_user->getGuardUser()->getFirstName() ?> &nbsp;
                <?php echo $sf_user->getGuardUser()->getLastName() ?>&nbsp;]
            </a>
            
        </li>
    </ul>
</nav>

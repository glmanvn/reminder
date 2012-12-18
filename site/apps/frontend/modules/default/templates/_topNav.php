<script lang="javascript">
    // open reminder as a Popup
    function showPopup(url, title, w, h) {  
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var targetWin = window.open (url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
        targetWin.focus();
    } 
    
    $(document).ready(function() {
        // TODO: Call action to check reminder this moment
        var startPoll = function() {
            // Call check action
            $.ajax({
                type: 'POST',
                url: '<?php echo url_for('task/alert') ?>',
                dataType: 'json',
                async: false,
                cache: false,
                data:{
                },
                success: function(data){
                    $return = eval(data);
                    if($return.status == 'success')
                    {
                        showPopup('/taskalert/index?page=1', 'Reminder task', 700, 400);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //return false;
                }
            });
        }

        setInterval(startPoll, 120000); /*Make next polling request after X seconds, 1000 ~ 1s*/
    });
    
</script>
<nav>
    <ul class="nav main">
        <li class="<?php if ($sf_request->getParameter('module') == 'default') echo 'current' ?>">
            <a href="<?php echo url_for('@homepage') ?>">Trang chủ</a>
        </li>
        <li class="<?php if ($sf_request->getParameter('module') == 'task') echo 'current' ?>">
            <a href="<?php echo url_for('task/index') ?>">Công việc</a>
        </li>
        <li class="<?php if ($sf_request->getParameter('module') == 'signout') echo 'current' ?>" style="float: right;">
            <a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a>
        </li>
        <li style="float: right;">
            <a href="user/changePassword">
                [&nbsp;<?php echo $sf_user->getGuardUser()->getFirstName() ?> &nbsp;
                <?php echo $sf_user->getGuardUser()->getLastName() ?>&nbsp;]
            </a>
            
        </li>
    </ul>
</nav>

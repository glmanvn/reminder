<div id="sf_admin_container">
    <h1>Xem yêu cầu công việc: <?php echo $task->getTaskName(); ?></h1>

    <div id="sf_admin_header"></div>

    <div id="sf_admin_content">

        <div class="sf_admin_form">
            <fieldset id="sf_fieldset_none">
                <div class="sf_admin_form_row">
                    <div>
                        <label id="bold">Tên công việc</label>
                        <div class="content"><?php echo $task->getTaskName(); ?></div>
                    </div>
                </div>
                <div class="sf_admin_form_row">
                    <div>
                        <label id="bold">Mô tả</label>
                        <div class="content"><?php echo $task->getTaskDescription(); ?></div>
                    </div>
                </div>
                <div class="sf_admin_form_row">
                    <div class="grid_4">
                        <label id="bold">Ngày tạo</label>
                        <div class="content"><?php echo $task->getCreatedAt(); ?></div>
                    </div>
                    <div class="grid_4">
                        <label id="bold">Ngày tạo</label>
                        <div class="content"><?php echo $task->getCreatedAt(); ?></div>
                    </div>
                </div>
                <div class="sf_admin_form_row">
                    <div>
                        <label id="bold">Ngày tạo</label>
                        <div class="content"><?php echo $task->getCreatedAt(); ?></div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
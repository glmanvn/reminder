<?php include_partial('global/layout_header') ?> 

<div class="container_12 container">
    <div class="grid_12">
        <header>
            <?php include_component('default', 'topNav') ?>
        </header>
        <div class="clear"></div>
        <section id="main" role="main">
            <div class="grid_2">
                <div class="box">
                    <?php include_component_slot('sidebar') ?>
                </div>
            </div>
            <div class="grid_10">
                <div class="clearfix">&nbsp;</div>
                <?php echo $sf_content ?>
            </div>
        </section>
        <div class="clear"></div>
        <footer id="site_info">
            <div class="box">
                <p>
                    Copyright <?php echo sfConfig::get('app_website_name') . ' ' . date('Y') ?> &copy; All rights reserved. 
                </p>
            </div>
        </footer>
    </div>
</div>

<?php include_partial('global/layout_footer') ?> 

<div id="sub-nav">
    <?php 
      $nb_to_show = 7;
      $showCount = (count($categories) > $nb_to_show) ? $nb_to_show : count($categories); 
    ?>  
    <ul>
        <?php foreach ($categories as $i => $cat): ?>
            <?php if($i < $showCount):?>
                <li><?php echo link_to($cat['name'], '@browse_category?slug='.$cat['slug']) ?></li>
            <?php else: break;?>
            <?php endif;?>
        <?php endforeach ?>
        <?php /* if($showCount == $nb_to_show):?>
        <li> <a class="more" rel="more" href="#">More</a> </li>
        <?php endif; */?>
    </ul>
    
    <?php if($showCount == $nb_to_show):?>
    <!-- drop down menu -->                                                   
    <ul>
        <?php foreach ($categories as $i => $cat): ?>
            <?php if($i >= $showCount):?>
                <li><?php echo link_to($cat['name'], '@browse_category?slug='.$cat['slug']) ?></li>
            <?php endif;?>
        <?php endforeach ?>
    </ul>     
    <script type="text/javascript">			
        //cssdropdown.startchrome("sub-nav")			
    </script>
    <?php endif;?>
</div> <!-- END navigation -->
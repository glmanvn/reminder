<?php use_helper('GMap') ?>
<?php include_google_map_javascript_file($gMap); ?>

<?php include_map($gMap, array('width'=>$width . 'px', 'height'=>$height . 'px')); ?>  

<!-- Javascript included at the bottom of the page -->
<?php include_map_javascript($gMap); ?>
<?php
  /**
   * Parameters:
   *   - $pager sfDoctrinePager (required)
   *   - $url string (required)
   *   - $method string (optional, e.g.: 'get')
   *   - $module string (required if $method=='get')
   *   - $action string (required if $method=='get')
   *   - $routing string (if set, module and action will not be used)
   */

  /* @var $pager sfDoctrinePager */

  // to prevent php warning/error
  if (!isset($method)) $method = null;

  // if method is get, we use normal url like:
  //   module/action?a=b&c=d
  // instead of symfony url like:
  //   module/action/a/b/c/d
  if ($method=='get')
  {
    if (isset($routing))
    {
      $get_url = url_for($sf_data->getRaw('routing')).$url;
    }
    else
    {
      $get_url = url_for($sf_data->getRaw('module').'/'.$sf_data->getRaw('action')).$url;
    }
  }
?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="page-nav">
    <?php // link to first page
      if ($method=='get'):
        echo '<a href="'.$get_url.'page='.$pager->getFirstPage().'">&laquo;</a>';
      else:
        echo link_to('&laquo;', $url.'page='.$pager->getFirstPage());
      endif;
    ?>
    <?php // link to previous page
      if ($method=='get'):
        echo '<a href="'.$get_url.'page='.$pager->getPreviousPage().'">&lt;</a>';
      else:
        echo link_to('&lt;', $url.'page='.$pager->getPreviousPage());
      endif;
    ?>
    <?php $links = $pager->getLinks() ?>
    <?php foreach ($links as $page): ?>
      <?php
        if ($method=='get'):
          $page_url = '<a href="'.$get_url.'page='.$page.'">'.$page.'</a>';
        else:
          $page_url = link_to($page, $url.'page='.$page);
        endif;
      ?>
      <?php echo ($page == $pager->getPage()) ? "<span>$page</span>" : $page_url ?>
      <?php if ($page != $pager->getCurrentMaxLink()): ?> - <?php endif ?>
    <?php endforeach ?>
    <?php // link to next page
      if ($method=='get'):
        echo '<a href="'.$get_url.'page='.$pager->getNextPage().'">&gt;</a>';
      else:
        echo link_to('&gt;', $url.'page='.$pager->getNextPage());
      endif;
    ?>
    <?php // link to last page
      if ($method=='get'):
        echo '<a href="'.$get_url.'page='.$pager->getLastPage().'">&raquo;</a>';
      else:
        echo link_to('&raquo;', $url.'page='.$pager->getLastPage());
      endif;
    ?>
  </div>
  <?php endif ?>
<?php

/**
 * sfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserTable extends PluginsfGuardUserTable {

    /**
     * Returns an instance of this class.
     *
     * @return object sfGuardUserTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('sfGuardUser');
    }

    /**
     * Search products by category / subcategory
     * having pagination
     * 
     * @param type $categoryId
     * @param type $subCategoryId
     * @param type $page
     * @param type $maxPerPage
     * @return sfDoctrinePager 
     */
    public function findUsersPager($page, $maxPerPage, $userId) {
        $class = 'sfGuardUser';
        $query = Doctrine_Query::create()
                ->select('u.*')
                ->from('sfGuardUser u')
                ->where('u.is_active=1')
                ->orderBy('u.username DESC')
        ;

        if ($userId > 0) {
            // Search by subcategory
            $query->addWhere('u.id <> ?', $userId);
        }

        $pager = new sfDoctrinePager($class, $maxPerPage);
        $pager->setPage($page);
        $pager->setQuery($query);
        $pager->init();

        return $pager;
    }

}
<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('task', 'piriority');
        $this->addColumn('task', 'priority', 'integer', '8', array(
             'notnull' => '1',
             'default' => '1',
             ));
    }

    public function down()
    {
        $this->addColumn('task', 'piriority', 'integer', '8', array(
             'notnull' => '1',
             'default' => '1',
             ));
        $this->removeColumn('task', 'priority');
    }
}
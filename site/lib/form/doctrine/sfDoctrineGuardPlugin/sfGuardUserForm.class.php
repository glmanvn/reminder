<?php

/**
 * sfGuardUser form.
 *
 * @package    reminder
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm {

    public function configure() {
        unset(
                $this['groups_list'], 
                $this['permissions_list'],
                $this['follow_user_id']
        );
    }

}

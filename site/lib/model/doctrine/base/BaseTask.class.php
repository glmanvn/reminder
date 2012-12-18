<?php

/**
 * BaseTask
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $follow_user_id
 * @property string $task_name
 * @property string $task_description
 * @property integer $priority
 * @property string $assigned_to
 * @property integer $reminded_count
 * @property timestamp $remind_1st_at
 * @property timestamp $remind_2rd_at
 * @property timestamp $remind_3th_at
 * @property string $reminder_email1
 * @property string $reminder_email2
 * @property string $completed_by
 * @property timestamp $completed_at
 * @property sfGuardUser $User
 * @property sfGuardUser $FollowUser
 * @property Doctrine_Collection $TaskComments
 * 
 * @method integer             getUserId()           Returns the current record's "user_id" value
 * @method integer             getFollowUserId()     Returns the current record's "follow_user_id" value
 * @method string              getTaskName()         Returns the current record's "task_name" value
 * @method string              getTaskDescription()  Returns the current record's "task_description" value
 * @method integer             getPriority()         Returns the current record's "priority" value
 * @method string              getAssignedTo()       Returns the current record's "assigned_to" value
 * @method integer             getRemindedCount()    Returns the current record's "reminded_count" value
 * @method timestamp           getRemind1stAt()      Returns the current record's "remind_1st_at" value
 * @method timestamp           getRemind2rdAt()      Returns the current record's "remind_2rd_at" value
 * @method timestamp           getRemind3thAt()      Returns the current record's "remind_3th_at" value
 * @method string              getReminderEmail1()   Returns the current record's "reminder_email1" value
 * @method string              getReminderEmail2()   Returns the current record's "reminder_email2" value
 * @method string              getCompletedBy()      Returns the current record's "completed_by" value
 * @method timestamp           getCompletedAt()      Returns the current record's "completed_at" value
 * @method sfGuardUser         getUser()             Returns the current record's "User" value
 * @method sfGuardUser         getFollowUser()       Returns the current record's "FollowUser" value
 * @method Doctrine_Collection getTaskComments()     Returns the current record's "TaskComments" collection
 * @method Task                setUserId()           Sets the current record's "user_id" value
 * @method Task                setFollowUserId()     Sets the current record's "follow_user_id" value
 * @method Task                setTaskName()         Sets the current record's "task_name" value
 * @method Task                setTaskDescription()  Sets the current record's "task_description" value
 * @method Task                setPriority()         Sets the current record's "priority" value
 * @method Task                setAssignedTo()       Sets the current record's "assigned_to" value
 * @method Task                setRemindedCount()    Sets the current record's "reminded_count" value
 * @method Task                setRemind1stAt()      Sets the current record's "remind_1st_at" value
 * @method Task                setRemind2rdAt()      Sets the current record's "remind_2rd_at" value
 * @method Task                setRemind3thAt()      Sets the current record's "remind_3th_at" value
 * @method Task                setReminderEmail1()   Sets the current record's "reminder_email1" value
 * @method Task                setReminderEmail2()   Sets the current record's "reminder_email2" value
 * @method Task                setCompletedBy()      Sets the current record's "completed_by" value
 * @method Task                setCompletedAt()      Sets the current record's "completed_at" value
 * @method Task                setUser()             Sets the current record's "User" value
 * @method Task                setFollowUser()       Sets the current record's "FollowUser" value
 * @method Task                setTaskComments()     Sets the current record's "TaskComments" collection
 * 
 * @package    reminder
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTask extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('task');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('follow_user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('task_name', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('task_description', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('priority', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('assigned_to', 'string', 100, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('reminded_count', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('remind_1st_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => 25,
             ));
        $this->hasColumn('remind_2rd_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => 25,
             ));
        $this->hasColumn('remind_3th_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => 25,
             ));
        $this->hasColumn('reminder_email1', 'string', 250, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 250,
             ));
        $this->hasColumn('reminder_email2', 'string', 250, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 250,
             ));
        $this->hasColumn('completed_by', 'string', 250, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 250,
             ));
        $this->hasColumn('completed_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => 25,
             ));

        $this->option('orderBy', 'created_at DESC');
        $this->option('type', 'MyISAM');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as FollowUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('TaskComment as TaskComments', array(
             'local' => 'id',
             'foreign' => 'task_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             'name' => 'is_deleted',
             'type' => 'boolean',
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}
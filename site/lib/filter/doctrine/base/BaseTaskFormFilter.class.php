<?php

/**
 * Task filter form base class.
 *
 * @package    reminder
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaskFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'task_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'task_description' => new sfWidgetFormFilterInput(),
      'priority'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'assigned_to'      => new sfWidgetFormFilterInput(),
      'reminded_count'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'remind_1st_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'remind_2rd_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'remind_3th_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'reminder_email1'  => new sfWidgetFormFilterInput(),
      'reminder_email2'  => new sfWidgetFormFilterInput(),
      'completed_by'     => new sfWidgetFormFilterInput(),
      'completed_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'is_deleted'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'user_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'task_name'        => new sfValidatorPass(array('required' => false)),
      'task_description' => new sfValidatorPass(array('required' => false)),
      'priority'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'assigned_to'      => new sfValidatorPass(array('required' => false)),
      'reminded_count'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'remind_1st_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'remind_2rd_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'remind_3th_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'reminder_email1'  => new sfValidatorPass(array('required' => false)),
      'reminder_email2'  => new sfValidatorPass(array('required' => false)),
      'completed_by'     => new sfValidatorPass(array('required' => false)),
      'completed_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_deleted'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('task_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Task';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'user_id'          => 'ForeignKey',
      'task_name'        => 'Text',
      'task_description' => 'Text',
      'priority'         => 'Number',
      'assigned_to'      => 'Text',
      'reminded_count'   => 'Number',
      'remind_1st_at'    => 'Date',
      'remind_2rd_at'    => 'Date',
      'remind_3th_at'    => 'Date',
      'reminder_email1'  => 'Text',
      'reminder_email2'  => 'Text',
      'completed_by'     => 'Text',
      'completed_at'     => 'Date',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'is_deleted'       => 'Boolean',
    );
  }
}

<?php

/**
 * Task form base class.
 *
 * @method Task getObject() Returns the current form's model object
 *
 * @package    reminder
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaskForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'task_name'        => new sfWidgetFormInputText(),
      'task_description' => new sfWidgetFormTextarea(),
      'priority'         => new sfWidgetFormInputText(),
      'assigned_to'      => new sfWidgetFormInputText(),
      'reminded_count'   => new sfWidgetFormInputText(),
      'remind_1st_at'    => new sfWidgetFormDateTime(),
      'remind_2rd_at'    => new sfWidgetFormDateTime(),
      'remind_3th_at'    => new sfWidgetFormDateTime(),
      'reminder_email1'  => new sfWidgetFormInputText(),
      'reminder_email2'  => new sfWidgetFormInputText(),
      'completed_by'     => new sfWidgetFormInputText(),
      'completed_at'     => new sfWidgetFormDateTime(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'is_deleted'       => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'task_name'        => new sfValidatorString(array('max_length' => 150)),
      'task_description' => new sfValidatorString(array('required' => false)),
      'priority'         => new sfValidatorInteger(array('required' => false)),
      'assigned_to'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'reminded_count'   => new sfValidatorInteger(array('required' => false)),
      'remind_1st_at'    => new sfValidatorDateTime(array('required' => false)),
      'remind_2rd_at'    => new sfValidatorDateTime(array('required' => false)),
      'remind_3th_at'    => new sfValidatorDateTime(array('required' => false)),
      'reminder_email1'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'reminder_email2'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'completed_by'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'completed_at'     => new sfValidatorDateTime(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'is_deleted'       => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('task[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Task';
  }

}

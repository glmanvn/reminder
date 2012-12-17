<?php

/**
 * task module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage task
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaskGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'Tạo mới Công việc',  ),  '_edit' =>   array(    'label' => 'Sửa',  ),  '_delete' =>   array(    'label' => 'Xóa',  ),  '_list' =>   array(    'label' => 'Danh sách',  ),  '_save' =>   array(    'label' => 'Ghi',  ),  '_save_and_add' =>   array(    'label' => 'Ghi và tiếp tục',  ),);
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' =>   array(    'credentials' => 'admin',  ),  'viewComment' =>   array(    'label' => 'Xem',    'action' => 'viewComment',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%_taskName%% - %%_createdBy%% - %%created_at%% - %%assigned_to%% - %%_priority%% - %%_statusMin%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'DANH SÁCH CÔNG VIỆC';
  }

  public function getEditTitle()
  {
    return 'XEM/SỬA NỘI DUNG CÔNG VIỆC: ';
  }

  public function getNewTitle()
  {
    return 'THÊM MỚI CÔNG VIỆC';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'assigned_to',  1 => 'created_at',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '_taskName',  1 => '_createdBy',  2 => 'created_at',  3 => 'assigned_to',  4 => '_priority',  5 => '_statusMin',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'task_name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Tên công việc',),
      'task_description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Mô tả công việc',  'attributes' =>   array(    'rows' => 5,    'cols' => 80,  ),),
      'priority' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Độ ưu tiên',),
      'assigned_to' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Người xử lý',  'help' => 'Nhập tên người được giao xử lý',),
      'reminded_count' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'remind_1st_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Nhắc lần 1 lúc',  'help' => 'Hiển thị màn hình nhắc việc trên web tại thời điểm (mặc định sao 10 phút)',),
      'remind_2rd_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'remind_3th_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'reminder_email1' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Email thông báo lần 1',  'help' => 'Địa chỉ email để gửi cảnh báo nếu task bị chậm lần 1',),
      'reminder_email2' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Email thông báo lần 2',  'help' => 'Địa chỉ email để gửi cảnh báo nếu task bị chậm lần 2',),
      'completed_by' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'completed_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Ngày tạo',  'date_format' => 'yyyy/MM/dd hh:mm:ss',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'is_deleted' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'taskName' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Tên công việc',),
      'statusMin' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Trạng thái',),
      'createdBy' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Người tạo',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'user_id' => array(),
      'task_name' => array(),
      'task_description' => array(),
      'priority' => array(),
      'assigned_to' => array(),
      'reminded_count' => array(),
      'remind_1st_at' => array(),
      'remind_2rd_at' => array(),
      'remind_3th_at' => array(),
      'reminder_email1' => array(),
      'reminder_email2' => array(),
      'completed_by' => array(),
      'completed_at' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'is_deleted' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'user_id' => array(),
      'task_name' => array(),
      'task_description' => array(),
      'priority' => array(),
      'assigned_to' => array(),
      'reminded_count' => array(),
      'remind_1st_at' => array(),
      'remind_2rd_at' => array(),
      'remind_3th_at' => array(),
      'reminder_email1' => array(),
      'reminder_email2' => array(),
      'completed_by' => array(),
      'completed_at' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'is_deleted' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'user_id' => array(),
      'task_name' => array(),
      'task_description' => array(),
      'priority' => array(),
      'assigned_to' => array(),
      'reminded_count' => array(),
      'remind_1st_at' => array(),
      'remind_2rd_at' => array(),
      'remind_3th_at' => array(),
      'reminder_email1' => array(),
      'reminder_email2' => array(),
      'completed_by' => array(),
      'completed_at' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'is_deleted' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'user_id' => array(),
      'task_name' => array(),
      'task_description' => array(),
      'priority' => array(),
      'assigned_to' => array(),
      'reminded_count' => array(),
      'remind_1st_at' => array(),
      'remind_2rd_at' => array(),
      'remind_3th_at' => array(),
      'reminder_email1' => array(),
      'reminder_email2' => array(),
      'completed_by' => array(),
      'completed_at' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'is_deleted' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'user_id' => array(),
      'task_name' => array(),
      'task_description' => array(),
      'priority' => array(),
      'assigned_to' => array(),
      'reminded_count' => array(),
      'remind_1st_at' => array(),
      'remind_2rd_at' => array(),
      'remind_3th_at' => array(),
      'reminder_email1' => array(),
      'reminder_email2' => array(),
      'completed_by' => array(),
      'completed_at' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'is_deleted' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'TaskForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'TaskFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}

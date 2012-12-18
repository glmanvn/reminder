<?php

/**
 * taskalert module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage taskalert
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaskalertGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'Tạo mới Công việc',  ),  '_edit' =>   array(    'label' => 'Sửa',  ),  '_delete' =>   array(    'label' => 'Xóa',  ),  '_list' =>   array(    'label' => 'Danh sách',  ),  '_save' =>   array(    'label' => 'Ghi',  ),);
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
    return array();
  }

  public function getListActions()
  {
    return array();
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%_taskAlert%%';
  }

  public function getListLayout()
  {
    return 'stacked';
  }

  public function getListTitle()
  {
    return 'CẢNH BÁO: CÔNG VIỆC CẦN HOÀN THÀNH NGAY';
  }

  public function getEditTitle()
  {
    return 'Xem yêu cầu công việc: %%task_name%%';
  }

  public function getNewTitle()
  {
    return 'Thêm mới yêu cầu công việc';
  }

  public function getFilterDisplay()
  {
    return array();
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
    return array(  0 => '_taskAlert',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'follow_user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
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
      'taskAlert' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'CHI TIÊT',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'user_id' => array(),
      'follow_user_id' => array(),
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
      'follow_user_id' => array(),
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
      'follow_user_id' => array(),
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
      'follow_user_id' => array(),
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
      'follow_user_id' => array(),
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
    return 1;
  }

  public function getDefaultSort()
  {
    return array('priority', 'desc');
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

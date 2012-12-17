<?php

class sfValidatorSchemaCompareValues extends sfValidatorSchemaCompare
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * left_field:         The left field name
   *  * operator:           The comparison operator
   *                          * sfValidatorSchemaCompare::EQUAL
   *                          * sfValidatorSchemaCompare::NOT_EQUAL
   *                          * sfValidatorSchemaCompare::LESS_THAN
   *                          * sfValidatorSchemaCompare::LESS_THAN_EQUAL
   *                          * sfValidatorSchemaCompare::GREATER_THAN
   *                          * sfValidatorSchemaCompare::GREATER_THAN_EQUAL
   *  * right_field:        The right field name
   *  * values:             array of request values, e.g. array('first_name' => 'Bob', 'last_name' => 'Builder')
   *  * throw_global_error: Whether to throw a global error (false by default) or an error tied to the left field
   *
   * @param string $leftField   The left field name
   * @param string $operator    The operator to apply
   * @param string $rightField  The right field name
   * @param array $values
   * @param array  $options     An array of options
   * @param array  $messages    An array of error messages
   *
   * @see sfValidatorCompare
   * @see sfValidatorBase
   */
  public function __construct($leftField, $operator, $rightField, $values, $options = array(), $messages = array())
  {
    $this->addOption('values', $values);
    parent::__construct($leftField, $operator, $rightField, $options, $messages);
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($values)
  {
    $values = $this->getOption('values');
//    $left_field = $this->getOption('left_field');
//    $right_field = $this->getOption('right_field');
//    
//    if (!$values or !is_array($values))
//    {
//      $values = array();
//    }
//
//    if (!isset($values[$left_field])) $values[$left_field] = null;
//    if (!isset($values[$right_field])) $values[$right_field] = null;
    
    return parent::doClean($values);
  }
}

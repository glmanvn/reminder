<?php

class myWidgetFormSchemaFormatterCustom extends sfWidgetFormSchemaFormatter {
  
  protected 
    $rowFormat = "\n%error%\n<div class=\"formRow\">\n<div class=\"formLabel inline\">%label%</div>\n<div class=\"formField inline\">%field%\n%help%</div></div>\n%hidden_fields%", 
    $helpFormat = '<div class="fieldHelp">%help%</div>', 
    $errorRowFormat = "<div>\n%errors%<br /></div>\n", 
    $errorListFormatInARow = "<ul>%errors%</ul>\n", 
    $errorRowFormatInARow =  "<li class=\"error\">&darr; %error% &darr;</li>\n", 
    $namedErrorRowFormatInARow = "<li class=\"error\">&darr; %error% &darr;</li>\n", 
    $decoratorFormat = "%content%";
  
  /**
   * @var sfValidatorSchema
   */
  private $validatorSchema = null;

  protected $showRedStar = true;

  /**
   * Red star is the required field sign
   *
   * @return boolean
   */
  public function getShowRedStar()
  {
    return $this->showRedStar;
  }

  /**
   * Red star is the required field sign, set this to false to
   * not show it even when the field is a required field.
   *
   * @param boolean $b
   */
  public function setShowRedStar($b)
  {
    $this->showRedStar = $b;
  }
    
  /**
   * Constructor
   *
   * @param sfWidgetSchema $widgetSchema
   * @param sfValidatorSchema $validatorSchema
   */
  public function __construct($widgetSchema, $validatorSchema=null)
  {
    $this->validatorSchema = $validatorSchema;
    parent::__construct($widgetSchema);
  }
  
  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    if (stripos($field, 'revertedCheckbox') !== FALSE)
    {
      return strtr($this->getRowFormat(), array(
        '%label%'         => ' ',
        '%field%'         => '<div class="inner-checkbox">'.$field.'</div><div class="inner-label">'.$label.'</div>',
        '%error%'         => $this->formatErrorsForRow($errors),
        '%help%'          => $this->formatHelp($help),
        '%hidden_fields%' => is_null($hiddenFields) ? '%hidden_fields%' : $hiddenFields,
      ));
    }

    return strtr($this->getRowFormat(), array(
      '%label%'         => $label,
      '%field%'         => $field,
      '%error%'         => $this->formatErrorsForRow($errors),
      '%help%'          => $this->formatHelp($help),
      '%hidden_fields%' => is_null($hiddenFields) ? '%hidden_fields%' : $hiddenFields,
    ));
  }

  /**
   * Generates a label for the given field name.
   *
   * @param  string $name        The field name
   * @param  array  $attributes  Optional html attributes for the label tag
   *
   * @return string The label tag
   */
  public function generateLabel($name, $attributes = array())
  {
    if ( $this->validatorSchema and isset($this->validatorSchema[$name]) )
    {
      $validator = $this->validatorSchema[$name];
      /* @var $validator sfValidatorBase */
      
      if ( $this->getShowRedStar() && $validator->getOption('required') ) @$attributes['class'] .= ' required';
    }
    
    return parent::generateLabel($name, $attributes);
  }
  
  
}
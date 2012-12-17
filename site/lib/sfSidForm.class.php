<?php

class sfSidForm extends sfForm {
  
  private $labels = array();
  private $widgets = array();
  private $validators = array();
//  private $retype_validators = array();
  private $use_default_messages = array();
  private $helps = array();
  /**
   * Extra parameters
   *
   * @var array
   */
  protected $extra_params = array();
  
  const MODE_NEW = 1; // new record
  const MODE_EDIT = 2; // edit record
  const MODE_CUSTOMISE = 3; // customise
  const MODE_DELETE = 4; // delete
  const MODE_UPLOAD = 5; // upload image
    
  /**
   * Constructor
   *
   * @param array $extra_params
   * @param array $defaults
   * @param array $options
   * @param string $CSRFSecret
   */
  public function __construct($extra_params=array(), $defaults=array(), $options=array(), $CSRFSecret=null)
  {
    $this->extra_params = $extra_params;

    $object = $this->getParameter('object');
    if ($object)
    {
      $obj_defaults = $object->toArray();
      $defaults = array_merge($defaults, $obj_defaults);
    }
    
    parent::__construct($defaults, $options, $CSRFSecret);
  }

  /**
   * Returns base page url,
   * e.g.: "?key1=val1&key2=val2&",
   * Usually for form method GET (e.g.: search form).
   *
   * @return string
   */
  public function getPageUrl()
  {
    $url = '?';
    $values = $this->getParameter('values', $this->getValues());
    $name_format = $this->widgetSchema->getNameFormat();

    if (is_array($values) && count($values) > 0)
    {
      foreach ($values as $key => $v)
      {
        $formatted_key = sprintf($name_format, $key);

        // if not array
        if (!is_array($v))
        {
          $url .= urlencode($formatted_key).'='.urlencode($v).'&';
        }
        // if array
        else
        {
          foreach ($v as $kk => $vv)
          {
            $url .= urlencode($formatted_key).'['.urlencode($kk).']='.urlencode($vv).'&';
          }
        }

      }
    }

    return $url;
  }

  /**
   * Returns $then if parameter $key == $value otherwise returns $else
   *
   * @param string $key
   * @param mixed $value
   * @param mixed $then
   * @param mixed $else
   */
  public function ifParameter($key, $value, $then, $else)
  {
    if ($this->getParameter($key) === $value)
    {
      return $then;
    }
    else
    {
      return $else;
    }
  }
  
  /**
   * Returns true if parameter[$key] === $value, false otherwise.
   *
   * @param string $key
   * @param mixed $value
   */
  public function trueIfParameter($key, $value)
  {
    if ($this->getParameter($key) === $value)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  /**
   * Returns the value of field $name from getValue or getDefault or getParameter, in that order.
   *
   * @param string $name
   * @param mixed $default_value
   * @return mixed
   */
  public function getValueOf($name, $default_value=null)
  {
    if ($this->getValue($name)) return $this->getValue($name);
    if ( $this->getDefault($name) ) return $this->getDefault($name);
    
    $values = $this->getParameter('values');
    if ($values and is_array($values) and isset($values[$name]))
    {
      return $values[$name];
    }
    
    return $default_value;
  }
  
//  /**
//   * Add a retype field.
//   *
//   * @param string $retype_field
//   * @param string $retype_label
//   * @param string $source_field
//   * @param sfValidatorBase $validator
//   * @param string $error_message
//   */
//  public function addRetypeField($retype_field, $retype_label, $source_field, $validator, $error_message)
//  {
//    $this->labels[$retype_field] = $retype_label;
//    $this->widgets[$retype_field] = clone $this->widgets[$source_field];
//    $this->validators[$retype_field] = $validator;
//    
//    //$this->validators[$retype_field] = clone $this->validators[$source_field];
//    //$this->validators[$retype_field] = new sfValidatorSchemaCompare($retype_field, sfValidatorSchemaCompare::EQUAL, $source_field, array(), array('invalid' => $error_message));
//    
//    $this->use_default_messages[$retype_field] = true;
//    
//    $this->retype_validators[$retype_field] = array(
//      'source_field' => $source_field,
//      'error_message' => $error_message
//    );
//  }

  /**
   * Setup the form
   *
   */
  public function setup()
  {
    $this->setupFields();
    $this->applyFields();
    
    $this->widgetSchema->setNameFormat($this->getParameter('name_format'));

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $decorator = new myWidgetFormSchemaFormatterCustom($this->widgetSchema, $this->validatorSchema);
    $this->widgetSchema->addFormFormatter('custom', $decorator); 
    $this->widgetSchema->setFormFormatterName('custom');
    
    parent::setup();
  }
  
  
  /**
   * Returns the value of extra_params of specified $key or return the $default_value
   *
   * @param string $key
   * @param mixed $default_value
   * @return mixed
   */
  public function getParameter($key, $default_value=null)
  {
    if (isset($this->extra_params[$key]))
    {
      return $this->extra_params[$key];
    }
    else
    {
      return $default_value;
    }
  }
  
  /**
   * Set the value of extra_params
   *
   * @param string $key
   * @param mixed $value
   * @return void
   */
  public function setParameter($key, $value)
  {
    $this->extra_params[$key] = $value;
  }
  
  /**
   * Add a field into this form
   *
   * @param string $name
   * @param string $label
   * @param sfWidget $widget
   * @param sfValidator $validator
   * @param boolean $use_default_messages (if true, use default messages)
   * @return void
   */
  public function addField($name, $label, $widget, $validator, $use_default_messages=true, $help=null)
  {
    $widget->setAttribute('class', $widget->getAttribute('class').' '.get_class($widget));
    
    $this->labels[$name] = $label;
    $this->widgets[$name] = $widget;
    $this->validators[$name] = $validator;
    $this->use_default_messages[$name] = $use_default_messages;
    if ($help) $this->helps[$name] = $help;
  }
  
  /**
   * Apply fields added using addField function to the form.
   *
   */
  public function applyFields()
  {
//    $object = $this->getParameter('object');
//    
//    $default_values = array();
//    if ($object)
//    {
//      $default_values = $object->toArray(BasePeer::TYPE_FIELDNAME);
//    }
    
    foreach ($this->widgets as $name => $w)
    {
      /* @var $w sfWidgetForm */
      $v = $this->validators[$name];
      /* @var $v sfValidatorBase */
      
      // if we are to use default messages on the widget
      if ($this->use_default_messages[$name])
      {
        $messages = $v->getMessages();
        foreach ($messages as $err_code => $err_msg)
        {
          switch ($err_code)
          {
            case 'required': $messages[$err_code] = $this->labels[$name].' is required'; break;
            case 'invalid': $messages[$err_code] = $this->labels[$name].' is invalid'; break;
            case 'max_length': $messages[$err_code] = $this->labels[$name].' must not be longer than %max_length% characters'; break;
            case 'min_length': $messages[$err_code] = $this->labels[$name].' must not be shorter than %min_length% characters'; break;
          }
        }
        $v->setMessages($messages);
      }
      
//      // set default value
//      if (isset($default_values[$name]))
//      {
//        $this->setDefault($name, $default_values[$name]);
//      }
    }
    
    $this->setWidgets($this->widgets);
    $this->setValidators($this->validators);
    $this->widgetSchema->setLabels($this->labels);
    $this->widgetSchema->setHelps($this->helps);
    
//    foreach ($this->retype_validators as $retype_field => $a)
//    {
//      $source_field = $a['source_field'];
//      $error_message = $a['error_message'];
//      
//      //$this->validatorSchema[$retype_field] = clone $this->validatorSchema[$source_field];
//      $this->mergePostValidator(new sfValidatorSchemaCompare(
//        $retype_field, sfValidatorSchemaCompare::EQUAL, $source_field, array('throw_global_error' => true), array('invalid' => $error_message)));
//    }
  }
  
  /**
   * Bind override
   */
  public function bind(array $taintedValues = null, array $taintedFiles = array()) {
    $request = sfContext::getInstance()->getRequest();

    if ($request->hasParameter(self::$CSRFFieldName))         {
        $taintedValues[self::$CSRFFieldName] = $request->getParameter(self::$CSRFFieldName);
    }

    parent::bind($taintedValues, $taintedFiles);
  }
  
}
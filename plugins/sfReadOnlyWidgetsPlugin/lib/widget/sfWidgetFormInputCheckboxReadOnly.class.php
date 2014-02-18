<?php

class sfWidgetFormInputCheckboxReadOnly extends sfWidgetFormInputCheckbox
{

//para que no se borre los choices siempre
//  public function __construct($options = array(), $attributes = array())
//  {
//    if (!isset($options["choices"]))
//    {
//      $options['choices'] = array();
//    }
//
//    sfWidgetFormChoice::__construct($options, $attributes);
//  }
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption("form");
    $this->addRequiredOption("column");

    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $form = $this->getOption("form");
    $column = $this->getOption("column");
    $translator_array = array(
        0 => '<span class="sf_admin_action_new sf_admin_action s16 s16_cross"></span>',
        1 => '<span class="sf_admin_action_new sf_admin_action s16 s16_tick"></span>',
    );

    if (!$form->isNew())
    {
      return $translator_array[$form->getObject()->$column];
    }
    else
    {
      return parent::render($name, $value, $attributes, $errors);
    }
  }
}
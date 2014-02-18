<?php

class sfWidgetFormDoctrineChoiceReadOnly extends sfWidgetFormDoctrineChoice
{

  //para que no se borre los choices siempre
  public function __construct($options = array(), $attributes = array())
  {
    if (!isset($options["choices"]))
    {
      $options['choices'] = array();
    }

    sfWidgetFormChoice::__construct($options, $attributes);
  }
  
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption("form");
    $this->addRequiredOption("column");
    $this->addOption("translator_function", null);
    $this->addOption("helper_for_function", null);
    $this->addOption("translator_array", array());

    $this->addOption("model", null);

    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $form = $this->getOption("form");
    $column = $this->getOption("column");
    $translator_function = $this->getOption("translator_function");
    $helper_for_function = $this->getOption("helper_for_function");
    $translator_array = $this->getOption("translator_array");

    if (!is_null($helper_for_function))
    {
      sfApplicationConfiguration::getActive()->loadHelpers($helper_for_function);
    }

    if (!$form->isNew())
    {
      if (isset($form->getObject()->$column))
      {
        if (!is_null($translator_function))
        {
          return $translator_function($form->getObject()->$column);
        }
        elseif (count($translator_array) > 0)
        {
          return $translator_array[$form->getObject()->$column];
        }
        else
        {
          return $form->getObject()->$column;
        }
      }
      else
      {
        return "No asignado";
      }
    }
    else
    {
      return parent::render($name, $value, $attributes, $errors);
    }
  }
  
  public function getChoices()
  {
    //si se ingresaron choices los ponemos
    if (count($this->options["choices"]) > 0)
    {
      if ($this->options["add_empty"])
      {
        return array(null => null) + $this->options["choices"];
      }
      else
      {
        return $this->options["choices"];
      }
    }

    //si no se ingresaron los generamos igual que sfWidgetFormDoctrineChoice
    else
    {
      return parent::getChoices();
    }
  }
}
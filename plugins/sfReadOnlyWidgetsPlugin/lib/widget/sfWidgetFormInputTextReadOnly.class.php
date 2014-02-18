<?php

class sfWidgetFormInputTextReadOnly extends sfWidgetFormInputText
{

  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption("form");

    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $form = $this->getOption("form");

    if (!$form->isNew())
    {
      return $value;
    }
    else
    {
      return parent::render($name, $value, $attributes, $errors);
    }
  }
}
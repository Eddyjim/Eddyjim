<?php

/**
 * Section form base class.
 *
 * @method Section getObject() Returns the current form's model object
 *
 * @package    Eddyjim
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'icon'         => new sfWidgetFormInputText(),
      'order'        => new sfWidgetFormInputText(),
      'Pages_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('page'), 'add_empty' => false)),
      'banners_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Banner')),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 45)),
      'icon'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'order'        => new sfValidatorInteger(array('required' => false)),
      'Pages_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('page'))),
      'banners_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Banner', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Section', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('section[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Section';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['banners_list']))
    {
      $this->setDefault('banners_list', $this->object->banners->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savebannersList($con);

    parent::doSave($con);
  }

  public function savebannersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['banners_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->banners->getPrimaryKeys();
    $values = $this->getValue('banners_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('banners', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('banners', array_values($link));
    }
  }

}

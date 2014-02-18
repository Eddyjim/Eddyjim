<?php

/**
 * SectionBanner form base class.
 *
 * @method SectionBanner getObject() Returns the current form's model object
 *
 * @package    Eddyjim
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSectionBannerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'section_id' => new sfWidgetFormInputHidden(),
      'banner_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'section_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('section_id')), 'empty_value' => $this->getObject()->get('section_id'), 'required' => false)),
      'banner_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('banner_id')), 'empty_value' => $this->getObject()->get('banner_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('section_banner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SectionBanner';
  }

}

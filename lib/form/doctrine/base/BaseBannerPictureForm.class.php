<?php

/**
 * BannerPicture form base class.
 *
 * @method BannerPicture getObject() Returns the current form's model object
 *
 * @package    Eddyjim
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBannerPictureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'banner_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('banner'), 'add_empty' => false)),
      'picture'   => new sfWidgetFormInputText(),
      'order'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'banner_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('banner'))),
      'picture'   => new sfValidatorString(array('max_length' => 45)),
      'order'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BannerPicture', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('banner_picture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BannerPicture';
  }

}

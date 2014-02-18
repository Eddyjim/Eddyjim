<?php

/**
 * BannerPicture filter form base class.
 *
 * @package    Eddyjim
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBannerPictureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'banner_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('banner'), 'add_empty' => true)),
      'picture'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'banner_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('banner'), 'column' => 'id')),
      'picture'   => new sfValidatorPass(array('required' => false)),
      'order'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('banner_picture_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BannerPicture';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'banner_id' => 'ForeignKey',
      'picture'   => 'Text',
      'order'     => 'Number',
    );
  }
}

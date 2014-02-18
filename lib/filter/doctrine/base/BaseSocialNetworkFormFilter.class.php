<?php

/**
 * SocialNetwork filter form base class.
 *
 * @package    Eddyjim
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSocialNetworkFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'icon'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'  => new sfValidatorPass(array('required' => false)),
      'link'  => new sfValidatorPass(array('required' => false)),
      'icon'  => new sfValidatorPass(array('required' => false)),
      'order' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('social_network_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SocialNetwork';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'name'  => 'Text',
      'link'  => 'Text',
      'icon'  => 'Text',
      'order' => 'Number',
    );
  }
}

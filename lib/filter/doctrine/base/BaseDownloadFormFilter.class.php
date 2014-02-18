<?php

/**
 * Download filter form base class.
 *
 * @package    Eddyjim
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDownloadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(),
      'file'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sections_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('section'), 'add_empty' => true)),
      'type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'file'        => new sfValidatorPass(array('required' => false)),
      'sections_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('section'), 'column' => 'id')),
      'type'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('download_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Download';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'description' => 'Text',
      'file'        => 'Text',
      'sections_id' => 'ForeignKey',
      'type'        => 'Text',
    );
  }
}

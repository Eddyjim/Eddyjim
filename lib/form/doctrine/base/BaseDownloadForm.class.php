<?php

/**
 * Download form base class.
 *
 * @method Download getObject() Returns the current form's model object
 *
 * @package    Eddyjim
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDownloadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'file'        => new sfWidgetFormInputText(),
      'sections_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('section'), 'add_empty' => false)),
      'type'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 45)),
      'description' => new sfValidatorString(array('required' => false)),
      'file'        => new sfValidatorString(array('max_length' => 255)),
      'sections_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('section'))),
      'type'        => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Download', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('download[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Download';
  }

}

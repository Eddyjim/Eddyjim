<?php

/**
 * Comment form base class.
 *
 * @method Comment getObject() Returns the current form's model object
 *
 * @package    Eddyjim
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormTextarea(),
      'Publications_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Publication'), 'add_empty' => true)),
      'Comments_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Comment'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'         => new sfValidatorString(array('max_length' => 45)),
      'description'     => new sfValidatorString(),
      'Publications_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Publication'), 'required' => false)),
      'Comments_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Comment'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Comment', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

}

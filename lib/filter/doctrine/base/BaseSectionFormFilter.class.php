<?php

/**
 * Section filter form base class.
 *
 * @package    Eddyjim
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSectionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'icon'         => new sfWidgetFormFilterInput(),
      'order'        => new sfWidgetFormFilterInput(),
      'Pages_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('page'), 'add_empty' => true)),
      'banners_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Banner')),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'icon'         => new sfValidatorPass(array('required' => false)),
      'order'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Pages_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('page'), 'column' => 'id')),
      'banners_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Banner', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('section_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addBannersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.SectionBanner SectionBanner')
      ->andWhereIn('SectionBanner.banner_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Section';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'icon'         => 'Text',
      'order'        => 'Number',
      'Pages_id'     => 'ForeignKey',
      'banners_list' => 'ManyKey',
    );
  }
}

<?php

/**
 * Banner filter form base class.
 *
 * @package    Eddyjim
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBannerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sections_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Section')),
    ));

    $this->setValidators(array(
      'sections_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Section', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSectionsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('SectionBanner.section_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Banner';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'banner_style_id' => 'Number',
      'sections_list'   => 'ManyKey',
    );
  }
}

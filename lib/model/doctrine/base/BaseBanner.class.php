<?php

/**
 * BaseBanner
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $banner_style_id
 * @property BannerStyle $bannerStyle
 * @property BannerStyle $BannerStyle
 * @property Doctrine_Collection $Sections
 * @property Doctrine_Collection $BannerPictures
 * @property Doctrine_Collection $SectionBanner
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getBannerStyleId()   Returns the current record's "banner_style_id" value
 * @method BannerStyle         getBannerStyle()     Returns the current record's "bannerStyle" value
 * @method BannerStyle         getBannerStyle()     Returns the current record's "BannerStyle" value
 * @method Doctrine_Collection getSections()        Returns the current record's "Sections" collection
 * @method Doctrine_Collection getBannerPictures()  Returns the current record's "BannerPictures" collection
 * @method Doctrine_Collection getSectionBanner()   Returns the current record's "SectionBanner" collection
 * @method Banner              setId()              Sets the current record's "id" value
 * @method Banner              setBannerStyleId()   Sets the current record's "banner_style_id" value
 * @method Banner              setBannerStyle()     Sets the current record's "bannerStyle" value
 * @method Banner              setBannerStyle()     Sets the current record's "BannerStyle" value
 * @method Banner              setSections()        Sets the current record's "Sections" collection
 * @method Banner              setBannerPictures()  Sets the current record's "BannerPictures" collection
 * @method Banner              setSectionBanner()   Sets the current record's "SectionBanner" collection
 * 
 * @package    Eddyjim
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBanner extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Banners');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unique' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('banner_style_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));


        $this->index('fk_Banners_BannerStyles1_idx', array(
             'fields' => 
             array(
              0 => 'banner_style_id',
             ),
             ));
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('BannerStyle as bannerStyle', array(
             'local' => 'banner_style_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('BannerStyle', array(
             'local' => 'banner_style_id',
             'foreign' => 'id'));

        $this->hasMany('Section as Sections', array(
             'refClass' => 'SectionBanner',
             'local' => 'banner_id',
             'foreign' => 'section_id'));

        $this->hasMany('BannerPicture as BannerPictures', array(
             'local' => 'id',
             'foreign' => 'banner_id'));

        $this->hasMany('SectionBanner', array(
             'local' => 'id',
             'foreign' => 'banner_id'));
    }
}
<?php

/**
 * BaseBannerStyle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $direction
 * @property string $effect
 * @property Doctrine_Collection $Banners
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method string              getDirection()   Returns the current record's "direction" value
 * @method string              getEffect()      Returns the current record's "effect" value
 * @method Doctrine_Collection getBanners()     Returns the current record's "Banners" collection
 * @method BannerStyle         setId()          Sets the current record's "id" value
 * @method BannerStyle         setName()        Sets the current record's "name" value
 * @method BannerStyle         setDescription() Sets the current record's "description" value
 * @method BannerStyle         setDirection()   Sets the current record's "direction" value
 * @method BannerStyle         setEffect()      Sets the current record's "effect" value
 * @method BannerStyle         setBanners()     Sets the current record's "Banners" collection
 * 
 * @package    Eddyjim
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBannerStyle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('BannerStyles');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unique' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 45,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('direction', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('effect', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));

        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Banner as Banners', array(
             'local' => 'id',
             'foreign' => 'banner_style_id'));
    }
}
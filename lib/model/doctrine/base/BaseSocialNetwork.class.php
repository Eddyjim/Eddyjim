<?php

/**
 * BaseSocialNetwork
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property blob $link
 * @property string $icon
 * @property integer $order
 * 
 * @method integer       getId()    Returns the current record's "id" value
 * @method string        getName()  Returns the current record's "name" value
 * @method blob          getLink()  Returns the current record's "link" value
 * @method string        getIcon()  Returns the current record's "icon" value
 * @method integer       getOrder() Returns the current record's "order" value
 * @method SocialNetwork setId()    Sets the current record's "id" value
 * @method SocialNetwork setName()  Sets the current record's "name" value
 * @method SocialNetwork setLink()  Sets the current record's "link" value
 * @method SocialNetwork setIcon()  Sets the current record's "icon" value
 * @method SocialNetwork setOrder() Sets the current record's "order" value
 * 
 * @package    Eddyjim
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSocialNetwork extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('SocialNetworks');
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
        $this->hasColumn('link', 'blob', 65535, array(
             'type' => 'blob',
             'notnull' => true,
             'length' => 65535,
             ));
        $this->hasColumn('icon', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('order', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));

        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}
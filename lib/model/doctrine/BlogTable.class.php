<?php

/**
 * BlogTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BlogTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BlogTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Blog');
    }
}
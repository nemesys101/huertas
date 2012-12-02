<?php

/**
 * BasePrecioEnFeria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $cultivo_id
 * @property string $nombre_en_planilla
 * @property date $fecha
 * @property decimal $precio
 * @property Doctrine_Collection $Cultivo
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePrecioEnFeria extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('precio_en_feria');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('cultivo_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('nombre_en_planilla', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('fecha', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('precio', 'decimal', 8, array(
             'type' => 'decimal',
             'length' => '8',
             'scale' => '2',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Cultivo', array(
             'local' => 'cultivo_id',
             'foreign' => 'id'));
    }
}
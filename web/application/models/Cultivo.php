<?php

/**
 * Cultivo
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Cultivo extends BaseCultivo
{

}

class CultivoTable extends Doctrine_Table
{
  /**
   * Returns a list of cultivos based on the provided filters
   *
   * @param integer $max_results
   * @param array $filters
   * @param boolean $as_array
   * @return array|Doctrine_Collection
   * @author Juan Peon <nemesys101@gmail.com>
   **/
  public static function get_suggestions($max_results=false,$filters=false,$as_array=true)
  {
    $q = Doctrine_Query::create()
      ->select('c.*,p.fecha,p.precio')
      ->leftJoin('c.Precios p')
      ->from('Cultivo c')
      ;
    if($as_array) {
      $q->setHydrationMode(Doctrine::HYDRATE_ARRAY);
    }
    if($filters) {
      if(isset($filters['pais']) && $filters['pais']) {
        $q->andWhere('c.pais = ?',$filters['pais']);
      }
      if(isset($filters['almacigos']) && $filters['almacigos']) {
        $q->andWhere('c.forma_siembra = "Directa"');
      }
      if(isset($filters['inicio_de_cosecha']) && $filters['inicio_de_cosecha']) {
        $q->andWhere('c.meses_plantacion LIKE ?','%'.$filters['inicio_de_cosecha'].'%');
      }
      if(isset($filters['tiempo_de_cosecha']) && $filters['tiempo_de_cosecha'] && $filters['tiempo_de_cosecha'] != '150+') {
        $q->andWhere('c.tiempo_hasta_cosecha_min <= ?',$filters['tiempo_de_cosecha']);
      }
    }

    return $q->execute();
  }
}
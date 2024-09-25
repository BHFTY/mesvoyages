<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visite>
 */

/**
 * @method Visite|null find($id, $lockMode = null, $lockVersion =null)
 * @method Visite|null findOneBy(array $criteria, array $orderBy =null)
 * @method Visite[]    findAll()
 * @method Visit[]     findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null]
 */

class VisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visite::class);
    }

    //    /**
    //     * @return Visite[] Returns an array of Visite objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Visite
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    
    
 /**
 * Retourne toutes les visites triées sur un champ
 * @param type $champ
 * @param type $ordre
 * @return Visite[]
 */
    public function findAllOrderBy($champ, $ordre): array{
        return $this ->createQueryBuilder('v')
                 ->orderBy('v.'.$champ, $ordre)
                 ->getQuery()
                 ->getResult();
    
    }
    
 /**
 * Enregistrements dont un champ est égal à une valeur 
 * ou tous les enregistrement si la valeur est vide
 *@param type $champ
 *@param type $valeur
 *@return Visite[]    
 */
 public function findByEqualValue($champ, $valeur) : array{
    if($valeur==""){
         return $this->createQueryBuilder('v') //alias de la table
                 ->orderBy('v.'.$champ,'ASC')
                 ->getQuery()
                 ->getResult();
    }else{
       return $this->createQueryBuilder('v') //alias de la table
             ->where('v.'.$champ.'=:valeur')
             ->setParameter('valeur', $valeur)
             ->orderBy('v.datecreation', 'DESC')
             ->getQuery()
             ->getResult();
    }
 }  
 
 /**
  * Retourne les n visites les plus récentes
  * @param type $nb
  * @return Visite[]
  */
 public function findAllLasted($nb) : array{
     return $this ->createQueryBuilder('v')//alias de la table
        ->orderBy('v.datecreation', 'DESC')
        ->setMaxResults($nb)
        ->getQuery()
        ->getResult();
 }
 
 /**
  * Ajoute ou modifie une visite
  * @param Visite $visite
  * @return void
  */
  public function add(Visite $visite): void{
      
      $this->getEntityManager()->persist($visite);
      $this->getEntityManager()->flush();
  } 
  
  /**
   * Supprime une visite
   * @param Visite $visite
   * @return void
   */
  public function remove(Visite $visite) : void{
      $this->getEntityManager()->remove($visite);
      $this->getEntityManager()->flush();
      
  }
}

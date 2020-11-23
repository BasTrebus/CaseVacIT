<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function addInfo($params)
    {
        $user = $this->find($params["id"]);

        $em = $this->getEntityManager();

        $user->setAfbeelding($params["afbeelding"]);
        $user->setNaam($params["achternaam"]);
        $user->setAdres($params["adres"]);
        $user->setPostcode($params["postcode"]);
        $user->setPlaats($params["plaats"]);
        $user->setTelefoon($params["telefoon"]);
        $user->setTekst($params["tekst"]);
        $user->setRoepnaam($params["roepnaam"]);
        $user->setVoorletters($params["voorletters"]);
        $user->setGeboortedatum($params["geboortedatum"]);
        /* $user->setCv($params["CV"]); */

        $em->persist($user);
        $em->flush();
        
        return($user);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Sollicitatie;
use App\Entity\User;
use App\Entity\Vacature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sollicitatie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sollicitatie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sollicitatie[]    findAll()
 * @method Sollicitatie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SollicitatieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sollicitatie::class);
    }

    public function saveSollicitatie($params)
    {
        if(isset($params["id"])){
            $sollicitatie = $this->find($params["id"]);
        } else {
            $sollicitatie = new Sollicitatie();
        }

        $em = $this->getEntityManager();

        $user_repository = $em->getRepository(User::class);
        $vacature_repository = $em->getRepository(Vacature::class);

        $vacature = $vacature_repository->find($params["vacature_id"]);
        $werkgever = $user_repository->find($params["werkgever"]);
        $kandidaat = $user_repository ->find($params["user_id"]);

        $sollicitatie->setVacature($vacature);
        $sollicitatie->setKandidaat($kandidaat);
        $date = new \DateTime('@'.strtotime('now'));
        $sollicitatie->setDatetime($date);
        $sollicitatie->setUitgenodigd(0);
        $sollicitatie->setWerkgever($werkgever);

        $em->persist($sollicitatie);
        $em->flush();
        
        return($sollicitatie);
        
    }

    public function getSollicitaties($user_id)
    {
        $sollicitaties = $this->findBy(['kandidaat' => $user_id]);
        return(array("sollicitaties" => $sollicitaties));
    }

    // /**
    //  * @return Sollicitatie[] Returns an array of Sollicitatie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sollicitatie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

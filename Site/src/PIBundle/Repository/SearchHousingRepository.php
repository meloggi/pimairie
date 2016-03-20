<?php

namespace PIBundle\Repository;

/**
 * SearchHousingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SearchHousingRepository extends \Doctrine\ORM\EntityRepository
{
	public function findAppartment($data)
	{
        $query = $this->createQueryBuilder('a');

        $query->where('a.rent BETWEEN :rentmin AND :rentmax');
        
        if($data['location'] != 'Tous')
        {
        	$query->andWhere('a.location = :location')
        				->setParameter('location', $data['location']);
        }

        if($data['bailleur'] != 'Tous')
        {
        	$query->andWhere('a.bailleur = :bailleur')
        				->setParameter('bailleur', $data['bailleur']);
        }

        if($data['adress'] != 'Tous')
        {
        	$query->andWhere('a.adress = :adress')
        				->setParameter('adress', $data['adress']);
        }

        if($data['residence'] != 'Tous')
        {
        	$query->andWhere('a.residence = :residence')
        				->setParameter('residence', $data['residence']);
        }

        if($data['type'] != 'Tous')
        {
        	$query->andWhere('a.type = :type')
        				->setParameter('type', $data['type']);
        }

        if($data['floor'] != 'Tous')
        {
        	$query->andWhere('a.floor = :floor')
        				->setParameter('floor', $data['floor']);
        }

        if($data['numero'] != 'Tous')
        {
        	$query->andWhere('a.numero = :numero')
        				->setParameter('numero', $data['numero']);
        }

        if($data['contingent'] != 'Tous')
        {
        	$query->andWhere('a.contingent = :contingent')
        				->setParameter('contingent', $data['contingent']);
        }

        return $query->getQuery()->getResult();

    }    
}

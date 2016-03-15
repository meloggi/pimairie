<?php

namespace PIBundle\Repository;

/**
 * DemandeDemandeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DemandeDemandeRepository extends \Doctrine\ORM\EntityRepository
{
	public function findDemande($id){
		$query = $this->_em->createQuery('SELECT a FROM PIBundle:DemandeDemande a WHERE a.id = :id ');
		$query->setParameter('id', $id);
		

		return $query->getResult();

	}
}
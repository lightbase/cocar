<?php

namespace Swpb\Bundle\CocarBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MachineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PingComputadorRepository extends EntityRepository
{
    /**
     * Todas as entradas de ping
     *
     * @param $start \DateTime Data de início
     * @param $end \DateTime Data de fim
     * @return mixed
     */
    public function relatorioGeral($start, $end) {
        if(!isset($start)) {
                $start = (time() - ((60*60*24)*30));
                $start = new \DateTime(date("Y-m-d", $start));
        }

        if(!isset($end)) {
                $end = time() + (60*60*24);
                $end = new \DateTime(date("Y-m-d", $end));
        }

        $qb = $this->createQueryBuilder('p')
            ->select(
                'max(p.date) as last_ping',
                'c'
            )
            ->innerJoin("CocarBundle:Computador", "c", "WITH", "c.id = p.computador")
            ->andWhere("p.date BETWEEN :start AND :end")
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->groupBy('c');

        return $qb->getQuery()->execute();
    }
}

<?php

namespace Swpb\Bundle\CocarBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PrinterCounterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PrinterCounterRepository extends EntityRepository
{
    /**
     * Classe do relatório geral de impressão
     *
     * @param $start
     * @param $end
     * @return array
     */
    public function relatorioGeral($start, $end) {


        $_dql = "SELECT printer.id,
                        pc1.blackInk,
                        pc1.coloredInk,
                        max(pc1.date) as endDate,
                        max(pc1.prints) as printsEnd,
                        min(pc2.date) as startDate,
                        min(pc2.prints) as printsStart,
                        printer.name,
                        printer.description,
                        printer.host
                 FROM CocarBundle:Printer printer
                 LEFT JOIN CocarBundle:PrinterCounter pc1 WITH (pc1.printer = printer.id AND pc1.date BETWEEN :start AND :end)
                 LEFT JOIN CocarBundle:PrinterCounter pc2 WITH (pc2.printer = printer.id AND pc2.date BETWEEN :start AND :end)
                 GROUP BY printer.id,
                        pc1.blackInk,
                        pc1.coloredInk,
                        printer.name,
                        printer.description,
                        printer.host
                 ORDER BY printer.id ASC";

        return $this->getEntityManager()->createQuery( $_dql )
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getArrayResult();

    }

    /**
     * Classe do relatório geral de impressão no formato CSV
     *
     * @param $start
     * @param $end
     * @return array
     */
    public function relatorioCsvGeral($start, $end) {


        $_dql = "SELECT printer.id,
                        max(pc1.prints) as printsEnd,
                        max(pc1.date) as endDate,
                        min(pc2.prints) as printsStart,
                        min(pc2.date) as startDate,
                        printer.name,
                        printer.host,
                        (max(pc1.prints) - min(pc2.prints)) as totalPrints
                 FROM CocarBundle:Printer printer
                 LEFT JOIN CocarBundle:PrinterCounter pc1 WITH (pc1.printer = printer.id AND pc1.date BETWEEN :start AND :end)
                 LEFT JOIN CocarBundle:PrinterCounter pc2 WITH (pc2.printer = printer.id AND pc2.date BETWEEN :start AND :end)
                 GROUP BY printer.id,
                        printer.name,
                        printer.description,
                        printer.host
                 ORDER BY printer.id ASC";

        return $this->getEntityManager()->createQuery( $_dql )
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getArrayResult();

    }
}

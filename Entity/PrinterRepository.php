<?php

namespace Swpb\Bundle\CocarBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PrinterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PrinterRepository extends EntityRepository
{

    public function getModelsList() {
        $_dql = "SELECT DISTINCT printer.name as model
         FROM CocarBundle:Printer as printer
         LEFT JOIN CocarBundle:PrinterModels as m WITH printer.name = m.model
         WHERE m.model IS NULL
         AND printer.active = TRUE
         OR printer.active IS NULL
         ORDER BY printer.name
        ";

        return $this->getEntityManager()->createQuery($_dql)->getScalarResult();
    }
}

<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Breeder_Supplies;

/**
 * The repository for the App\Domain\Entities\Breeder_Supplies entity.
 */
interface IBreeder_SuppliesRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Breeder_Supplies[]
     */
    public function satisfying(ISpecification $specification) : array;
}

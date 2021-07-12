<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Advertise;

/**
 * The repository for the App\Domain\Entities\Advertise entity.
 */
interface IAdvertiseRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Advertise[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Advertise
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Advertise[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Advertise|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Advertise[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Advertise[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Advertise[]
     */
    public function satisfying(ISpecification $specification) : array;
}

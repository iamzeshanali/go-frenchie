<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Listings;

/**
 * The repository for the App\Domain\Entities\Listings entity.
 */
interface IListingsRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Listings[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Listings
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Listings[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Listings|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Listings[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Listings[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Listings[]
     */
    public function satisfying(ISpecification $specification) : array;
}

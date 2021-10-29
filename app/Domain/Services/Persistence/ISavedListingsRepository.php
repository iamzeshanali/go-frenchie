<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\SavedListings;

/**
 * The repository for the App\Domain\Entities\SavedListings entity.
 */
interface ISavedListingsRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return SavedListings[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedListings
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return SavedListings[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedListings|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return SavedListings[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedListings[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedListings[]
     */
    public function satisfying(ISpecification $specification) : array;
}

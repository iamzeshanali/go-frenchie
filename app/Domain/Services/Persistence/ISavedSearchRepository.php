<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\SavedSearch;

/**
 * The repository for the App\Domain\Entities\SavedSearch entity.
 */
interface ISavedSearchRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return SavedSearch[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedSearch
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return SavedSearch[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedSearch|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return SavedSearch[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedSearch[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedSearch[]
     */
    public function satisfying(ISpecification $specification) : array;
}

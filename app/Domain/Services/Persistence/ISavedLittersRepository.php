<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\SavedLitters;

/**
 * The repository for the App\Domain\Entities\SavedLitters entity.
 */
interface ISavedLittersRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return SavedLitters[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedLitters
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return SavedLitters[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedLitters|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return SavedLitters[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedLitters[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return SavedLitters[]
     */
    public function satisfying(ISpecification $specification) : array;
}

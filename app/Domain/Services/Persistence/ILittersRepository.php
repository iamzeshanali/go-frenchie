<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Litters;

/**
 * The repository for the App\Domain\Entities\Litters entity.
 */
interface ILittersRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Litters[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Litters
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Litters[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Litters|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Litters[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Litters[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Litters[]
     */
    public function satisfying(ISpecification $specification) : array;
}

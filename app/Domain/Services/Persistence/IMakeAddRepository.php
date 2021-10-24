<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\MakeAdd;

/**
 * The repository for the App\Domain\Entities\MakeAdd entity.
 */
interface IMakeAddRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return MakeAdd[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return MakeAdd
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return MakeAdd[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return MakeAdd|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return MakeAdd[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return MakeAdd[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return MakeAdd[]
     */
    public function satisfying(ISpecification $specification) : array;
}

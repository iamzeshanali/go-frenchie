<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Canine_Genetics;

/**
 * The repository for the App\Domain\Entities\Canine_Genetics entity.
 */
interface ICanine_GeneticsRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Genetics[]
     */
    public function satisfying(ISpecification $specification) : array;
}

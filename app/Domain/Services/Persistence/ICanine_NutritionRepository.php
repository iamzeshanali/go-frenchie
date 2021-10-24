<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Canine_Nutrition;

/**
 * The repository for the App\Domain\Entities\Canine_Nutrition entity.
 */
interface ICanine_NutritionRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Canine_Nutrition[]
     */
    public function satisfying(ISpecification $specification) : array;
}

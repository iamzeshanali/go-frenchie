<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\ApiConfig;

/**
 * The repository for the App\Domain\Entities\ApiConfig entity.
 */
interface IApiConfigRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return ApiConfig[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return ApiConfig
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return ApiConfig[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return ApiConfig|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return ApiConfig[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return ApiConfig[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return ApiConfig[]
     */
    public function satisfying(ISpecification $specification) : array;
}

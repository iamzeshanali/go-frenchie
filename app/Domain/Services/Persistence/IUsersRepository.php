<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Users;

/**
 * The repository for the App\Domain\Entities\Users entity.
 */
interface IUsersRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return Users[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return Users
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return Users[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Users|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return Users[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return Users[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return Users[]
     */
    public function satisfying(ISpecification $specification) : array;
}

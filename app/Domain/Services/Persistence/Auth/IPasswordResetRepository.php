<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence\Auth;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\Auth\PasswordReset;

/**
 * The repository for the App\Domain\Entities\Auth\PasswordResetMailService entity.
 */
interface IPasswordResetRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return PasswordReset[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return PasswordReset
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return PasswordReset[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return PasswordReset|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return PasswordReset[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return PasswordReset[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return PasswordReset[]
     */
    public function satisfying(ISpecification $specification) : array;
}

<?php declare(strict_types = 1);

namespace App\Domain\Services\Persistence;

use Dms\Core\Model\ICriteria;
use Dms\Core\Model\ISpecification;
use Dms\Core\Persistence\IRepository;
use App\Domain\Entities\EmailLogs;

/**
 * The repository for the App\Domain\Entities\EmailLogs entity.
 */
interface IEmailLogsRepository extends IRepository
{
    /**
     * {@inheritDoc}
     *
     * @return EmailLogs[]
     */
    public function getAll() : array;

    /**
     * {@inheritDoc}
     *
     * @return EmailLogs
     */
    public function get($id);

    /**
     * {@inheritDoc}
     *
     * @return EmailLogs[]
     */
    public function getAllById(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return EmailLogs|null
     */
    public function tryGet($id);

    /**
     * {@inheritDoc}
     *
     * @return EmailLogs[]
     */
    public function tryGetAll(array $ids) : array;

    /**
     * {@inheritDoc}
     *
     * @return EmailLogs[]
     */
    public function matching(ICriteria $criteria) : array;

    /**
     * {@inheritDoc}
     *
     * @return EmailLogs[]
     */
    public function satisfying(ISpecification $specification) : array;
}

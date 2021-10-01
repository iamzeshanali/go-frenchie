<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IEmailLogsRepository;
use App\Domain\Entities\EmailLogs;

/**
 * The database repository implementation for the App\Domain\Entities\EmailLogs entity.
 */
class DbEmailLogsRepository extends DbRepository implements IEmailLogsRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(EmailLogs::class));
    }
}
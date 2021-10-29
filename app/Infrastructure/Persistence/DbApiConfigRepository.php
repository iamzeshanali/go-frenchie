<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IApiConfigRepository;
use App\Domain\Entities\ApiConfig;

/**
 * The database repository implementation for the App\Domain\Entities\ApiConfig entity.
 */
class DbApiConfigRepository extends DbRepository implements IApiConfigRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(ApiConfig::class));
    }
}
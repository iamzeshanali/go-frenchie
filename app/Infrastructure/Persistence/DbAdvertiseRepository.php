<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IAdvertiseRepository;
use App\Domain\Entities\Advertise;

/**
 * The database repository implementation for the App\Domain\Entities\Advertise entity.
 */
class DbAdvertiseRepository extends DbRepository implements IAdvertiseRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Advertise::class));
    }
}
<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Domain\Entities\Listings;

/**
 * The database repository implementation for the App\Domain\Entities\Listings entity.
 */
class DbListingsRepository extends DbRepository implements IListingsRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Listings::class));
    }
}
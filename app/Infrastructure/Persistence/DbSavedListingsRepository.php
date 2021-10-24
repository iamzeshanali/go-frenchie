<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\ISavedListingsRepository;
use App\Domain\Entities\SavedListings;

/**
 * The database repository implementation for the App\Domain\Entities\SavedListings entity.
 */
class DbSavedListingsRepository extends DbRepository implements ISavedListingsRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(SavedListings::class));
    }
}
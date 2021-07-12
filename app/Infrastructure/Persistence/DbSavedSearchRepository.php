<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\ISavedSearchRepository;
use App\Domain\Entities\SavedSearch;

/**
 * The database repository implementation for the App\Domain\Entities\SavedSearch entity.
 */
class DbSavedSearchRepository extends DbRepository implements ISavedSearchRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(SavedSearch::class));
    }
}
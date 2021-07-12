<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\ISavedLittersRepository;
use App\Domain\Entities\SavedLitters;

/**
 * The database repository implementation for the App\Domain\Entities\SavedLitters entity.
 */
class DbSavedLittersRepository extends DbRepository implements ISavedLittersRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(SavedLitters::class));
    }
}
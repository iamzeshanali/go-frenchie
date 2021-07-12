<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\ILittersRepository;
use App\Domain\Entities\Litters;

/**
 * The database repository implementation for the App\Domain\Entities\Litters entity.
 */
class DbLittersRepository extends DbRepository implements ILittersRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Litters::class));
    }
}
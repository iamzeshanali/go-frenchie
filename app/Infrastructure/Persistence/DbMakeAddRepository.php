<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IMakeAddRepository;
use App\Domain\Entities\MakeAdd;

/**
 * The database repository implementation for the App\Domain\Entities\MakeAdd entity.
 */
class DbMakeAddRepository extends DbRepository implements IMakeAddRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(MakeAdd::class));
    }
}
<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\ICanine_GeneticsRepository;
use App\Domain\Entities\Canine_Genetics;

/**
 * The database repository implementation for the App\Domain\Entities\Canine_Genetics entity.
 */
class DbCanine_GeneticsRepository extends DbRepository implements ICanine_GeneticsRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Canine_Genetics::class));
    }
}
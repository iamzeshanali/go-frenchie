<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IBreeder_SuppliesRepository;
use App\Domain\Entities\Breeder_Supplies;

/**
 * The database repository implementation for the App\Domain\Entities\Breeder_Supplies entity.
 */
class DbBreeder_SuppliesRepository extends DbRepository implements IBreeder_SuppliesRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Breeder_Supplies::class));
    }
}
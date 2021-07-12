<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\ICanine_NutritionRepository;
use App\Domain\Entities\Canine_Nutrition;

/**
 * The database repository implementation for the App\Domain\Entities\Canine_Nutrition entity.
 */
class DbCanine_NutritionRepository extends DbRepository implements ICanine_NutritionRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Canine_Nutrition::class));
    }
}
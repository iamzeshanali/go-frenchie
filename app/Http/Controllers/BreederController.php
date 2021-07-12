<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Breeder_Supplies;
use App\Domain\Entities\Canine_Genetics;
use App\Domain\Entities\Canine_Nutrition;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Entities\Enums\UserRoleEnum;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\IBreeder_SuppliesRepository;
use App\Domain\Services\Persistence\ICanine_GeneticsRepository;
use App\Domain\Services\Persistence\ICanine_NutritionRepository;
use App\Domain\Services\Persistence\IUsersRepository;
use Dms\Core\Model\Object\Enum;
use Illuminate\Http\Request;

class BreederController extends Controller
{
    public $userRepository;
    public $breeder_SuppliesRepository;
    public $canine_geneticsRepository;
    public $canine_nutritionRepository;

    public function __construct(IUsersRepository $userRepository,IBreeder_SuppliesRepository $breeder_SuppliesRepository, ICanine_GeneticsRepository $canine_geneticsRepository, ICanine_NutritionRepository $canine_nutritionRepository)
    {
        $this->userRepository = $userRepository;
        $this->breeder_SuppliesRepository = $breeder_SuppliesRepository;
        $this->canine_geneticsRepository = $canine_geneticsRepository;
        $this->canine_nutritionRepository = $canine_nutritionRepository;
    }

    public function getAllBreeders()
    {
        $allBreeders =  $this->userRepository->matching(
            $this->userRepository->criteria()
                ->where(Users::ROLE, '=', new UserRoleEnum('breeder'))
                ->where(Users::IS_ACTIVE,'=',true)
        );

        return $allBreeders;
    }

    public function singleKennel($id){
        $singleKennel = $this->userRepository->get((int)$id);


        if(empty($singleKennel)){

        }else{
            $breederSupplies = $this->breeder_SuppliesRepository->matching(
                $this->breeder_SuppliesRepository->criteria()
                ->where(Breeder_Supplies::BREEDER,'=', $singleKennel)
                ->where(Breeder_Supplies::STATUS,'=', new ListingsStatusEnum('active'))
            );
            $canineGenetics = $this->canine_geneticsRepository->matching(
                $this->canine_geneticsRepository->criteria()
                    ->where(Canine_Genetics::BREEDER,'=', $singleKennel)
                    ->where(Canine_Genetics::STATUS,'=', new ListingsStatusEnum('active'))
            );
            $canineNutrition = $this->canine_nutritionRepository->matching(
                $this->canine_nutritionRepository->criteria()
                    ->where(Canine_Nutrition::BREEDER,'=', $singleKennel)
                    ->where(Canine_Nutrition::STATUS,'=', new ListingsStatusEnum('active'))
            );
//            dd($breederSupplies);
            return view('pages/kennel-profile', [
                'kennel' => $singleKennel,
                'breederSupplies' => $breederSupplies,
                'canineGenetics' => $canineGenetics,
                'canineNutrition' => $canineNutrition
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Domain\Entities\Enums\UserRoleEnum;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\IUsersRepository;
use Dms\Core\Model\Object\Enum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

class GeoLocationController extends Controller
{
    public $userRepository;
    public function __construct(IUsersRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request
     */
    public function index()
    {
        $ip = request()->ip();
//        dd($ip);
        $data = Location::get('185.101.200.1');
//        dd($data);
//        $data = Location::get($ip);

        return $data;
    }

    /**
     * @throws \Dms\Core\Exception\TypeMismatchException
     * @throws \Dms\Core\Model\Criteria\InvalidMemberExpressionException
     * @throws \Dms\Core\Exception\InvalidArgumentException
     */
    public  function findKennels($token, $responseType, $zipCode, $distance, $unit): array
    {

//        dd($token);
        $url = 'https://www.zipcodeapi.com/rest/'.$token.'/'.$responseType.'/'.$zipCode.'/'.$distance.'/'.$unit;
        $response = Http::timeout(10)->get($url);
        if($response->ok()){
            $formattedData = [];
            $allZipCodes = [];
            $kennels = [];
            $formattedData = $response->json();

              usort($formattedData['zip_codes'], function ($a, $b){
                 $c = $a['distance'] - $b['distance'];
                  return $c;
              });
//            dd($formattedData['zip_codes']);
            $allZipCodes = $formattedData['zip_codes'];

            foreach ($allZipCodes as $key=> $zip){
                $newKennel = $this->userRepository->matching(
                    $this->userRepository->criteria()
                        ->where(Users::ROLE, '=', new UserRoleEnum('breeder'))
                        ->where(Users::IS_ACTIVE, '=', true)
                        ->where(Users::ZIP, '=', $zip['zip_code'])
                );
                if(!empty($newKennel)){
                    array_push($kennels,$newKennel);
                }
            }
            if(empty($kennels)){
                return $kennels;
            }else{

                return $kennels[0];
            }
        }else{
            echo "API Expired or Wrong";
        }
    }

}

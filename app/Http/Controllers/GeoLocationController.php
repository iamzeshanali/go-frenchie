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
        $response = Http::timeout(100)->get($url);
//        dd($response->status());

        switch ($response->status()){
            case 400:
                dd('ERROR','The request format was not correct.');
                break;
            case 401:
                dd('ERROR','The API key was not found, was not activated, or has been disabled.');
                break;
            case 404:
                dd('ERROR','A zip code you provided was not found.');
                break;
            case 429:
                dd('ERROR','The usage limit for your application has been exceeded for the hour time period.');
                break;
            case 200:
                if($response->ok()){
                    $formattedData = [];
                    $allZipCodes = [];

                    $formattedData = $response->json();
//            dd($formattedData);

                    usort($formattedData['zip_codes'], function ($a, $b){
                        $c = $a['distance'] - $b['distance'];
                        return $c;
                    });
//            dd(count($formattedData['zip_codes']));
//            dd($formattedData['zip_codes']);
                    $allZipCodes = $formattedData['zip_codes'];

                    $allRegisteredKennels = $this->userRepository->getAll();

                    $kennelsZipCode = [];
                    foreach ($allRegisteredKennels as $kennel){
                        array_push($kennelsZipCode,$kennel->zip);
                    }
                    $apiZipCodes = [];
                    foreach ($allZipCodes as $key=> $zip){
                        array_push($apiZipCodes,$zip['zip_code']);
                    }
//            dd($kennelsZipCode,$apiZipCodes);
                    $matchedZipCodes = array_intersect($apiZipCodes, $kennelsZipCode);

                    $kennels = [];
                    foreach ($matchedZipCodes as $key=> $zip){
                        $newKennel = $this->userRepository->matching(
                            $this->userRepository->criteria()
                                ->where(Users::ROLE, '=', new UserRoleEnum('breeder'))
                                ->where(Users::IS_ACTIVE, '=', true)
                                ->where(Users::ZIP, '=', $zip)
                        );

                        if(!empty($newKennel)){
                            array_push($kennels,$newKennel);
                        }
                    }
//            dd(count($formattedData['zip_codes']),$kennels);

                    return $kennels;
                }else{
                    echo "API Expired or Wrong";
                }
                break;

        }

    }

}

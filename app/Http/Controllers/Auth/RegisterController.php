<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Entities\Enums\UserRoleEnum;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\Enum;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public $userRepository;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IUsersRepository $userRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function createCustomer(Request $request)
    {
        $matchingUser = $this->userRepository->matching(
            $this->userRepository->criteria()->where(
                Users::EMAIL, '=', new EmailAddress($request->input('email'))
            )
        );
        if(empty($matchingUser)){
            $customer = new Users();

            $customer->firstName = $request->get('firstName');
            $customer->lastName = $request->get('lastName');
            $customer->username = strtolower($customer->firstName).''.strtolower($customer->lastName);
            $customer->role = new UserRoleEnum('customer');
            $customer->isActive = false;
            $customer->email = new EmailAddress($request->get('email'));
            $customer->phone = $request->get('phone');
            $customer->address = $request->get('address');
            $customer->zip = $request->get('zip');
            $customer->city = $request->get('city');
            $customer->state = $request->get('state');
            $customer->hashedPassword = bcrypt($request->get('password'));
//            dd($customer);
            $this->userRepository->save($customer);

            return redirect()->route('login');
        }else{
            return redirect()->back()->with('error', 'Customer already exists.');
        }
    }


    protected function checkForExistingUser(Request $request){
        $matchingUser = $this->userRepository->matching(
            $this->userRepository->criteria()->where(
                Users::EMAIL, '=', new EmailAddress($request->input('email'))
            )
        );
        if (empty($matchingUser)){
            return response()->json(['success'=>'404']);
        }else{
            return response()->json(['success'=>'200']);
        }


    }
    protected function createBreeder(Request $request)
    {
//        dd("DONE");
            $breeder = new Users();
            $breeder->firstName = $request->get('firstName');
            $breeder->lastName = $request->get('lastName');
            $breeder->username = strtolower($breeder->firstName).''.strtolower($breeder->lastName);
            $breeder->role = new UserRoleEnum('breeder');
            $breeder->isActive = false;
            $breeder->email = new EmailAddress($request->get('email'));
            $breeder->hashedPassword = bcrypt($request->get('password'));
            $breeder->rememberToken = null;
            $breeder->phone = $request->get('phone-number');
            $breeder->address = $request->get('address');
            $breeder->zip = $request->get('zip');
            $breeder->state = $request->get('state');
            $breeder->city = $request->get('city');
            $breeder->kennelName = $request->get('kennel-name');
            $breeder->fbAccountUrl = new Url($request->get('b-facebook'));
            $breeder->igAccountUrl = new Url($request->get('b-instagram'));
            $breeder->website = new Url($request->get('b-website'));

            $file =$request->file('b-logo');
            if($file){
                $fullPath = $file->move(public_path('app/breeder'), $file->getClientOriginalName())->getRealPath();
                $breeder->logo = new Image($fullPath);
            }else{
                $breeder->logo = null;
            }
            $this->userRepository->save($breeder);

            return redirect()->route('login');
    }


    public function updateRegisteredUser(Request $request){
        $currentUser = $this->userRepository->matching(
            $this->userRepository->criteria()->where(
                Users::EMAIL, '=', Auth::User()->email
            )
        )[0] ?? null;
        $currentUser->firstName = $request->get('firstName');
        $currentUser->lastName = $request->get('lastName');
        $currentUser->username = strtolower($currentUser->firstName).''.strtolower($currentUser->lastName);
        $currentUser->role = new UserRoleEnum($request->get('role'));
        $currentUser->phone = $request->get('phone-number');
        $currentUser->address = $request->get('address');
        $currentUser->zip = $request->get('zip');
        $currentUser->state = $request->get('state');
        $currentUser->city = $request->get('city');
        $currentUser->kennelName = $request->get('kennel-name');
        $currentUser->fbAccountUrl = new Url($request->get('b-facebook'));
        $currentUser->igAccountUrl = new Url($request->get('b-instagram'));
        $currentUser->website = new Url($request->get('b-website'));

        $file1 =$request->file('photo1');
        if ($file1 == null){
            if ($request->get('photo1_name')){
                $fullPath1 = $request->get('photo1_name');
                $fullPath1 = substr_replace($fullPath1, 'public/app/breeder', 44, 6);
                $currentUser->profileImage = new Image($fullPath1);
            }else{
                $currentUser->profileImage = null;
            }
        }else{
            $fullPath1 = $file1->move(public_path('app/breeder'), $file1->getClientOriginalName())->getRealPath();
            $currentUser->profileImage = new Image($fullPath1);
        }

        $file2 =$request->file('photo2');
        if ($file2 == null){
            if ($request->get('photo2_name')) {
                $fullPath2 = $request->get('photo2_name');
                $fullPath2 = substr_replace($fullPath2, 'public/app/breeder', 44, 6);
                $currentUser->logo = new Image($fullPath2);
            }else{
                $currentUser->logo = null;
            }
        }else{
            $fullPath2 = $file2->move(public_path('app/breeder'), $file2->getClientOriginalName())->getRealPath();
            $currentUser->logo = new Image($fullPath2);
        }

//        dd($currentUser);
        $this->userRepository->save($currentUser);

        return redirect()->route('breedersetting');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Core\Auth\IAuthSystem;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public $userRepository;

    public $breederRepository;


    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @var IAuthSystem
     */
    public $authRepository;

    public function __construct(IAuthSystem $authRepository, IUsersRepository $userRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->authRepository = $authRepository;
        $this->userRepository = $userRepository;
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('status','Admin has been logged out!');
    }
    public function login(Request $request){
        $matchingUser = $this->userRepository->matching(
            $this->userRepository->criteria()->where(
                Users::EMAIL, '=', new EmailAddress($request->input('email'))
            )
        )[0] ?? null;

        if(!($matchingUser)){
            return redirect()->back()->with('error', 'User does not exist.');
        }else{
                $hashed = $matchingUser->hashedPassword;
                if(password_verify($request->input('password'), $hashed)){
                    Auth::login($matchingUser);
                    if($matchingUser->role->getValue() == 'breeder'){
                        return redirect()->route('dashboard');
                    }else{
                        return redirect()->route('breederProfile');
                    }
                }else{
                    return redirect()->back()->with('error', 'Password does not match.');
                }

        }

    }

}

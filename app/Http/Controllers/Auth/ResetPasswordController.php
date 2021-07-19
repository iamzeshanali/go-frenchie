<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Entities\Auth\PasswordReset;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\Auth\IPasswordResetRepository;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\EmailAddress;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    public $userRepository;
    public $passwordResetRepository;

    public function __construct(IUsersRepository $userRepository, IPasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request)
    {


        $matching_token = $this->passwordResetRepository->matching(
            $this->passwordResetRepository->criteria()
                ->where(PasswordReset::TOKEN, '=', $request->token)
        );
        if($matching_token != null){
            $token = $request->token;
            return view('auth/passwords/reset',['token' => $token]);
        }else{
            dd("TOKEN Doesn't Match");
        }

    }
    public function reset(Request $request)
    {
//        dd($request->password, $request->password_confirmation);

        if($request->password === $request->password_confirmation){
            $matching_token = $this->passwordResetRepository->matching(
                $this->passwordResetRepository->criteria()
                    ->where(PasswordReset::TOKEN, '=', $request->token)
            );
            if($matching_token != null){

                $user = $this->userRepository->matching(
                    $this->userRepository->criteria()
                        ->where(Users::EMAIL, '=', $matching_token[0]->email)
                );
                if($user != null){
                    $user[0]->hashedPassword = bcrypt($request->get('password'));
                    $this->userRepository->save($user[0]);
                    $this->passwordResetRepository->remove($matching_token[0]);

                    return redirect()->route('login');
                }else{
                    return redirect()->back()->with('error','User doesnot found');
                }
            }else{
                dd("TOKEN Doesn't Match");
            }
        }else{
            return redirect()->back()->with('error','Password doesnt match');
        }


    }


}

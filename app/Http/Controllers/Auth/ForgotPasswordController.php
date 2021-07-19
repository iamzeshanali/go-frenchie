<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Entities\Auth\PasswordReset;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\Auth\IPasswordResetRepository;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Http\Controllers\Controller;
use App\Mail\ContactBreeder;
use Carbon\Carbon;
use Dms\Common\Structure\DateTime\DateTime;
use Dms\Common\Structure\Type\StringValueObject;
use Dms\Common\Structure\Web\EmailAddress;
use \Illuminate\Mail\Message;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use function Pinq\Tests\Integration\Parsing\func;
use App\Mail\PasswordResetMailService;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public $userRepository;
    public $passwordResetRepository;

    public function __construct(IUsersRepository $userRepository, IPasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }
    public function sendResetLinkEmail(Request $request)
    {
//        dd($request->get('token'));
        $user = $this->userRepository->matching(
            $this->userRepository->criteria()
            ->where(Users::EMAIL, '=', new EmailAddress($request->get('email')))
        );
        if (count($user) > 0){
            $passwordResetUser = new PasswordReset();
            $passwordResetUser->email = $user[0]->email;
            $passwordResetUser->token = $this->random_str(100);
            $passwordResetUser->created_at = new DateTime(Carbon::now());

            $this->passwordResetRepository->save($passwordResetUser);

            $email = $request->get('email');
//            dd($request->get('email'));
            $data = [
                'value'=>"dkldfgdfklgdfgdfg"
            ];
            $subject = "efjkhfghdigjdfjklgjdfg";

            echo ($email);
            echo ($passwordResetUser->token);
            echo ($user[0]->username);
            Mail::to($email)->send(new PasswordResetMailService($passwordResetUser->token,$user[0]->username,$email));

            return redirect()->back()->with('status', 'Password Reset link has been sent to your email.');

        }else{
            return redirect()->back()->with('error', 'No user exist for this email');
        }

    }
    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}



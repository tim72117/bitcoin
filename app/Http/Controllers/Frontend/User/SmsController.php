<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests\Frontend\User\TokenRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Access\User;

class SmsController extends Controller
{
    public function sendPhoneCode(Request $request)
    {
        $user = \Auth::user();
        $token = User\PhoneToken::create([
            'user_id' => $user->id
        ]);

        if ($token->sendCode()) {
            session()->put("token_id", $token->id);
            session()->put("user_id", $user->id);
            session()->put("remember", $request->get('remember'));

            return redirect()->route('frontend.user.account')->withFlashSuccess("Verification code sent");
        }

        $token->delete();// delete token because it can't be sent
        return redirect()->route('frontend.user.account')->withFlashDanger("Unable to send verification code");
    }
    
    public function confirmPhone(TokenRequest $request)
    {
        $user = \Auth::user();
        $tokenrequest = $request->only('token');
        
        
        if ($user->tokens->where('code', '=', $tokenrequest['token'])->first()==null)
            return redirect()->route('frontend.user.account')->withFlashDanger("Verification not exists");
        elseif (! $user->tokens->where('code', '=', $tokenrequest['token'])->first()->isExpired()) {
            $user->phone_confirmed = 1;
            $user->save();
            return redirect()->route('frontend.user.account')->withFlashSuccess("Verification success");
        }
        else 
            return redirect()->route('frontend.user.account')->withFlashDanger("Verification expired");
        
        
        
    }
}

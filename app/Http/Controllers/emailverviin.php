<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\otpverection;
// use Ichtrojan\Otp\Otp as OtpOtp;
// use Ichtrojan\Otp\Otp as OtpOtp;
// use Otp;
// use Otp;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class emailverviin extends Controller
{
    
    private $otp;

public function __construct(Otp $Otp)
    {
        $this->otp = $Otp;
    }
    public function sendEmailverction(Request $request){
       
 //

if(Auth::check()){
    $request->user()->notify(new otpverection());
    return response()->json($request->user());
}else{
    response()->json(" no authruthion");
}
 
 






    }
    public function loginOtp(Request $request)
    {
         /* validate otp */
          $otp =  $this->otp->validate($request->email,$request->otp);
          if(!$otp->status){
            return response([  'error'=> $otp      ],401);
          }
          $user=User::where('email',$request->email)->update(['email_verified_at'=>now()]);
        //   if(!$otp->status){
        //     return response([
        //         'success'=> $otp->status.'hhh',
        //         'message'  => $otp->message.'hhh',
        //  ]);
        //   }
         
        
    
         /* json response */
          return response([
                           'success'=> $otp->status.'bbb',
                           'message'  => $otp->message
                    ]);
    }

// $otp =  $this->otp->validate($request->mobile,$request->otp);

//       if($otp->status){
//         // add your action code here
//       }


//     public function GetloginOtp(Request $request)
//     {







//         $otp = $this->otp->generate($request->email, 6, 15); 

//         /* you and send OTP via sms or email  */
//         $smsOrEmailMessage = 'Use this code for login'.$otp->token;
        
  
       





//         return response([
//             'success'=> $otp->status,
//             'message'  => $otp->message
//             ]);






        


//     }





    }














    


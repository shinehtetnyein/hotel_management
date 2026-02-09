<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPassword extends Controller
{
    public function forgetPassword()
    {
        return view('hotel.forgetPassword');
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(length: 64);

        DB::table('forget_passwords')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Mail::send(view:"emails.forgetPassword",['token' => $token], function ($message) use ($request){
        //     $message->to($request->email);
        //     $message->subject("Reset Password");
        // });
        Mail::send('emails.forgetPassword', ['token' => $token], function ($message) use ($request) {
            // dd($token);
            $message->to($request->email)
                    ->subject('Reset Password');
        });
        

        return redirect()->route("forgetPassword")->with("success", "Please check your email to reset your password");

    }

    public function resetPassword($token)
    {
        return view('hotel.newPassword', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        // dd($request->email,$request->token);
        $request->validate([
            'email' => "required|email|exists:users",
            'password' => "required|string|min:6|confirmed",
            "password_confirmation" => "required",
        ]);

        $updatePassword = DB::table('forget_passwords')
            ->where([
                'email' => $request->email,
                // 'token' => $request->token,
            ])->first();
        // dd($updatePassword === true);
        if($updatePassword){
            $hashedToken = Hash::make($request->password);

            User::where('email', $request->email)
            ->update(['password' => $hashedToken]);

        DB::table('forget_passwords')->where('email', $request->email)->delete();
        return redirect()->route('login')->with('success', 'Password reset successful'); 
        }else{
            return redirect()->route('resetPassword', ['token' => $request->token])
                             ->with('error', 'Invalid');
        }
    }
}

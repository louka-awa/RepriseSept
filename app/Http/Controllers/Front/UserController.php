<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Cart;
use App\Models\Country;
use Auth;
use Validator;
use Session;
use Hash;

class UserController extends Controller
{
    public function loginRegister(){
        return view('front.users.login_register');
    }

    public function userRegister(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'mobile' => 'required|numeric|digits:9',
                'email' => 'required|email|max:150|unique:users',
                'password' => 'required|min:8',
                'accept' => 'required'
            ],
            [
                'accept.required'=>'Veuillez accepter les conditions d\'utilisation'
            ]);

            if($validator->passes()){
                // Enregistrer l'utilisateur
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();

                /* Activer l'utilisateur uniquement lorsque l'utilisateur confirme son compte email */

                $email = $data['email'];
                $messageData = ['name'=>$data['name'],'email'=>$data['email'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message)use($email){
                    $message->to($email)->subject('Confirmez votre compte Loukaawa');
                });

                // Rediriger l'utilisateur avec un message de succès
                $redirectTo = url('user/login-register');
                return response()->json(['type'=>'success','url'=>$redirectTo,'message'=>'Veuillez confirmer votre e-mail pour activer votre compte !']);

                /* Activer l'utilisateur immédiatement sans envoyer de courriel de confirmation */

                // Envoyer un email d'enregistrement
                $email = $data['email'];
                $messageData = ['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
                Mail::send('emails.register',$messageData,function($message)use($email){
                    $message->to($email)->subject('Bienvenue sur Loukaawa');
                });

                // Envoyer un SMS d'enregistrement
                $message = "Cher client, vous avez été enregistré avec succès sur Loukaawa. Connectez-vous à votre compte pour accéder aux commandes, adresses et offres disponibles.";
                $mobile = $data['mobile'];
                Sms:sendSms($message,$mobile);

                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    $redirectTo = url('cart');
                    // Mettre à jour le panier de l'utilisateur avec l'identifiant de l'utilisateur
                    if(!empty(Session::get('session_id'))){
                        $user_id = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                    }
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }




            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }

        }
    }

    public function userAccount(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:100',
                    'city' => 'required|string|max:100',
                    'state' => 'required|string|max:100',
                    'address' => 'required|string|max:100',
                    'country' => 'required|string|max:100',
                    'mobile' => 'required|numeric|digits:9',
                    'pincode' => 'required|digits:6',

                ]
            );

            if($validator->passes()){

                // Mettre à jour les détails de l'utilisateur
                User::where('id',Auth::user()->id)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'city'=>$data['city'],'state'=>$data['state'],'country'=>$data['country'],'pincode'=>$data['pincode'],'address'=>$data['address']]);

                // Rediriger l'utilisateur avec un message de succès
                return response()->json(['type'=>'success','message'=>'Vos coordonnées/adresses de facturation ont été mises à jour avec succès !']);

            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }

        }else{
            $countries = Country::where('status',1)->get()->toArray();
            return view('front.users.user_account')->with(compact('countries'));
        }
    }

    public function userUpdatePassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $validator = Validator::make($request->all(), [
                    'current_password' => 'required',
                    'new_password' => 'required|min:8',
                    'confirm_password' => 'required|min:8|same:new_password'

                ]
            );

            if($validator->passes()){

                $current_password = $data['current_password'];
                $checkPassword = User::where('id',Auth::user()->id)->first();
                if(Hash::check($current_password,$checkPassword->password)){

                    // Update User Current Password
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($data['new_password']);
                    $user->save();

                    // Redirect back user with success message
                return response()->json(['type'=>'success','message'=>'Mot de passe mis à jour avec succès!']);

                }else{
                    // Redirect back user with error message
                    return response()->json(['type'=>'incorrect','message'=>'votre mot de passe actuel est incorrect !']);
                }


                // Redirect back user with success message
                return response()->json(['type'=>'success','message'=>'Vos informations/coordonnées de facturation ont été mises à jour avec succès !']);

            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }

        }else{
            $countries = Country::where('status',1)->get()->toArray();
            return view('front.users.user_account')->with(compact('countries'));
        }
    }

    public function forgotPassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:150|exists:users'
                ],
                [
                    'email.exists'=>'L\'email n\existe pas!'
                ]
            );

            if($validator->passes()){
                // Generate New Password
                $new_password = Str::random(16);

                // Update New Password
                User::where('email',$data['email'])->update(['password'=>bcrypt($new_password)]);

                // Get User Details
                $userDetails = User::where('email',$data['email'])->first()->toArray();

                // Send Email to User
                $email = $data['email'];
                $messageData = ['name'=>$userDetails['name'],'email'=>$email,'password'=>$new_password];
                Mail::send('emails.user_forgot_password',$messageData,function($message) use($email){
                    $message->to($email)->subject('Nouveau mot de passe - Loukaawa');
                });

                // Show Success Message
                return response()->json(['type'=>'success','message'=>'Le nouveau mot de passe a été envoyé à votre adresse mail enregistrée']);

            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }

        }else{
            return view('front.users.forgot_password');
        }
    }

    public function userLogin(Request $request){
        if($request->Ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:150|exists:users',
                'password' => 'required|min:8'
            ]);

            if($validator->passes()){

                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                    if(Auth::user()->status==0){
                        Auth::logout();
                        return response()->json(['type'=>'inactive','message'=>'Votre compte n\'est pas activé ! Veuillez cliquer sur le lien envoyé par mail pour activer votre compte']);
                    }

                    // Update User Cart with user id
                    if(!empty(Session::get('session_id'))){
                        $user_id = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                    }


                    $redirectTo = url('cart');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }else{
                    return response()->json(['type'=>'incorrect','message'=>'Email ou mot de passe incorrect']);
                }

            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }

        }
    }

    public function userLogout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function confirmAccount($code){
        $email = base64_decode($code);
        $userCount = User::where('email',$email)->count();
        if($userCount>0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status==1){
                // Redirect the user to Login/Register Page with error message
                return redirect('user/login-register')->with('error_message','Votre compte est déjà activé. vous pouvez vous connecter.');
            }else{
                User::where('email',$email)->update(['status'=>1]);

                // Send Bienvenues Email
                $messageData = ['name'=>$userDetails->name,'mobile'=>$userDetails->mobile,'email'=>$email];
                Mail::send('emails.register',$messageData,function($message)use($email){
                    $message->to($email)->subject('Bienvenues sur Loukaawa');
                });

                // Redirect the user to Login/Register Page with success message
                return redirect('user/login-register')->with('success_message','votre compte est activé! Vous pouvez désormais vous connecter ');
            }
        }else{
            abort(404);
        }
    }
}

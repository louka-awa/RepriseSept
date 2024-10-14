<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use Validator;
use DB;

class VendorController extends Controller
{
    public function loginRegister(){
        return view('front.vendors.login_register');
    }

    public function vendorRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
           /* echo "<pre>"; print_r($data); die;*/

            // Valider le vendeur
            $regles = [
                "name" => "required",
                "email" => "required|email|unique:admins|unique:vendors",
                "mobile" => "required|min:10|numeric|unique:admins|unique:vendors",
                "accept" => "required"
            ];
            $messagesPersonnalises = [
                "name.required" => "Le nom est obligatoire",
                "email.required" => "L'email est obligatoire",
                "email.unique" => "L'email existe déjà",
                "mobile.required" => "Le mobile est obligatoire",
                "mobile.unique" => "Le mobile existe déjà",
                "accept.required" => "Veuillez accepter les termes et conditions",
            ];
            $validator = Validator::make($data, $regles, $messagesPersonnalises);
            if($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }

            DB::beginTransaction();

            // Créer un compte vendeur

            // Insérer les détails du vendeur dans la table `vendors`
            $vendor = new Vendor;
            $vendor->name = $data['name'];
            $vendor->mobile = $data['mobile'];
            $vendor->email = $data['email'];
            $vendor->status = 0;

            // Définir le fuseau horaire par défaut sur l'Inde
            date_default_timezone_set("Asia/Kolkata");
            $vendor->created_at = date("Y-m-d H:i:s");
            $vendor->updated_at = date("Y-m-d H:i:s");
            $vendor->save();

            $vendor_id = DB::getPdo()->lastInsertId();

            // Insérer les détails du vendeur dans la table `admins`
            $admin = new Admin;
            $admin->type = 'vendor';
            $admin->vendor_id = $vendor_id;
            $admin->name = $data['name'];
            $admin->mobile = $data['mobile'];
            $admin->email = $data['email'];
            $admin->password = bcrypt($data['password']);
            $admin->status = 0;

            // Définir le fuseau horaire par défaut sur l'Inde
            date_default_timezone_set("Asia/Kolkata");
            $admin->created_at = date("Y-m-d H:i:s");
            $admin->updated_at = date("Y-m-d H:i:s");
            $admin->save();

            // Envoyer un email de confirmation
            $email = $data['email'];
            $messageData = [
                'email' => $data['email'],
                'name' => $data['name'],
                'code' => base64_encode($data['email'])
            ];

            Mail::send('emails.vendor_confirmation', $messageData, function($message) use($email){
                $message->to($email)->subject('Confirmez votre compte vendeur');
            });

            DB::commit();

            // Rediriger le vendeur avec un message de succès
            $message = "Merci de vous être inscrit en tant que vendeur. Veuillez confirmer votre email pour activer votre compte.";
            return redirect()->back()->with('success_message', $message);
        }
    }

    public function confirmVendor($email){
        // Décoder l'email du vendeur
        $email = base64_decode($email);
        // Vérifier si l'email du vendeur existe
        $vendorCount = Vendor::where('email', $email)->count();
        if($vendorCount > 0){
            // L'email du vendeur est-il déjà activé ou non
            $vendorDetails = Vendor::where('email', $email)->first();
            if($vendorDetails->confirm == "Yes"){
                $message = "Votre compte vendeur est déjà confirmé. Vous pouvez vous connecter.";
                return redirect('vendor/login-register')->with('error_message', $message);
            }else{
                // Mettre à jour la colonne de confirmation à Oui dans les tables `admins` et `vendors` pour activer le compte
                Admin::where('email', $email)->update(['confirm' => 'Yes']);
                Vendor::where('email', $email)->update(['confirm' => 'Yes']);

                // Envoyer un email de confirmation d'inscription
                $messageData = [
                    'email' => $email,
                    'name' => $vendorDetails->name,
                    'mobile' => $vendorDetails->mobile
                ];

                Mail::send('emails.vendor_confirmed', $messageData, function($message) use($email){
                    $message->to($email)->subject('Votre compte vendeur a été confirmé');
                });

                // Rediriger vers la page de connexion/inscription des vendeurs avec un message de succès
                $message = "Votre compte vendeur a été confirmé. Vous pouvez vous connecter et ajouter vos informations personnelles, professionnelles et bancaires pour activer votre compte vendeur et ajouter des produits.";
                return redirect('vendor/login-register')->with('success_message', $message);
            }
        }else{
            abort(404);
        }
    }
}

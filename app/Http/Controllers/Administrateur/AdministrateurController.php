<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Administrateur;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use App\Models\Country;
use App\Models\Section;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Brand;
use App\Models\User;
use Image;
use Session;

class administrateurController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        $sectionsCount = Section::count();
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $couponsCount = Coupon::count();
        $brandsCount = Brand::count();
        $usersCount = User::count();
        return view('administrateur.dashboard')->with(compact('sectionsCount','categoriesCount','productsCount','ordersCount','couponsCount','brandsCount','usersCount'));
    }

    public function updateAdministrateurPassword(Request $request){
        Session::put('page','update_administrateur_password');
        if($request->isMethod('post')){
            $data = $request->all();
            // Vérifier si le mot de passe actuel saisi par l'administrateur est correct
            if(Hash::check($data['current_password'],Auth::guard('administrateur')->user()->password)){
                // Vérifier si le nouveau mot de passe correspond au mot de passe de confirmation
                if($data['confirm_password'] == $data['new_password']){
                    administrateur::where('id',Auth::guard('administrateur')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Le mot de passe a été mis à jour avec succès !');
                }else{
                    return redirect()->back()->with('error_message','Le nouveau mot de passe et le mot de passe de confirmation ne correspondent pas !');
                }
            }else{
                return redirect()->back()->with('error_message','Votre mot de passe actuel est incorrect !');
            }
        }
        $administrateurDetails = administrateur::where('email',Auth::guard('administrateur')->user()->email)->first()->toArray();
        return view('administrateur.settings.update_administrateur_password')->with(compact('administrateurDetails'));
    }
    
    public function checkadministrateurPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_password'],Auth::guard('administrateur')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }
    
    public function updateadministrateurDetails(Request $request){
        Session::put('page','update_administrateur_details');
        if($request->isMethod('post')){
            $data = $request->all();
    
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
            ];
    
            $customMessages = [
                'admin_name.required' => 'Le nom est obligatoire',
                'admin_name.regex' => 'Un nom valide est obligatoire',
                'admin_mobile.required' => 'Le numéro de téléphone est obligatoire',
                'admin_mobile.numeric' => 'Un numéro de téléphone valide est obligatoire',
            ];
    
            $this->validate($request, $rules, $customMessages);
    
            // Téléchargement de la photo de l'administrateuristrateur
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    // Obtenir l'extension de l'image
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Générer un nouveau nom d'image
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'administrateur/images/photos/'.$imageName;
                    // Télécharger l'image
                    Image::make($image_tmp)->save($imagePath);
                }
            }else if(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
            }else{
                $imageName = "";
            }
    
            // Mettre à jour les détails de l'administrateuristrateur
            administrateur::where('id',Auth::guard('administrateur')->user()->id)->update([
                'name'=>$data['admin_name'],
                'mobile'=>$data['admin_mobile'],
                'image'=>$imageName
            ]);
            return redirect()->back()->with('success_message','Les détails de l’administrateur ont été mis à jour avec succès !');
        }
        return view('administrateur.settings.update_administrateur_details');
    }
    


    public function updateVendorDetails($slug, Request $request){
        if($slug == "personal"){
            Session::put('page', 'update_personal_details');
            if($request->isMethod('post')){
                $data = $request->all();
    
                $rules = [
                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile' => 'required|numeric',
                ];
    
                $customMessages = [
                    'vendor_name.required' => 'Le nom est requis',
                    'vendor_city.required' => 'Le nom de la ville est requis',
                    'vendor_name.regex' => 'Un nom valide est requis',
                    'vendor_city.regex' => 'Une ville valide est requise',
                    'vendor_mobile.required' => 'Le numéro de téléphone est requis',
                    'vendor_mobile.numeric' => 'Un numéro de téléphone valide est requis',
                ];
    
                $this->validate($request, $rules, $customMessages);
    
                // Téléchargement de la photo du vendeur
                if($request->hasFile('vendor_image')){
                    $image_tmp = $request->file('vendor_image');
                    if($image_tmp->isValid()){
                        // Obtenir l'extension de l'image
                        $extension = $image_tmp->getClientOriginalExtension();
                        // Générer un nouveau nom d'image
                        $imageName = rand(111, 99999).'.'.$extension;
                        $imagePath = 'administrateur/images/photos/'.$imageName;
                        // Télécharger l'image
                        Image::make($image_tmp)->save($imagePath);
                    }
                } else if(!empty($data['current_vendor_image'])){
                    $imageName = $data['current_vendor_image'];
                } else {
                    $imageName = "";
                }
    
                // Mise à jour dans la table administrateurs
                administrateur::where('id', Auth::guard('administrateur')->user()->id)
                    ->update(['name' => $data['vendor_name'], 'mobile' => $data['vendor_mobile'], 'image' => $imageName]);
    
                // Mise à jour dans la table vendors
                Vendor::where('id', Auth::guard('administrateur')->user()->vendor_id)
                    ->update([
                        'name' => $data['vendor_name'],
                        'mobile' => $data['vendor_mobile'],
                        'address' => $data['vendor_address'],
                        'city' => $data['vendor_city'],
                        'state' => $data['vendor_state'],
                        'country' => $data['vendor_country'],
                        'pincode' => $data['vendor_pincode']
                    ]);
    
                return redirect()->back()->with('success_message', 'Les détails du vendeur ont été mis à jour avec succès !');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('administrateur')->user()->vendor_id)->first()->toArray();
        } 
        else if($slug == "business"){
            Session::put('page', 'update_business_details');
            if($request->isMethod('post')){
                $data = $request->all();
    
                $rules = [
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_city' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile' => 'required|numeric',
                    'address_proof' => 'required',
                ];
    
                $customMessages = [
                    'shop_name.required' => 'Le nom de la boutique est requis',
                    'shop_city.required' => 'Le nom de la ville est requis',
                    'shop_name.regex' => 'Un nom de boutique valide est requis',
                    'shop_city.regex' => 'Une ville valide est requise',
                    'shop_mobile.required' => 'Le numéro de téléphone est requis',
                    'shop_mobile.numeric' => 'Un numéro de téléphone valide est requis',
                ];
    
                $this->validate($request, $rules, $customMessages);
    
                // Téléchargement de la preuve d'adresse
                if($request->hasFile('address_proof_image')){
                    $image_tmp = $request->file('address_proof_image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 99999).'.'.$extension;
                        $imagePath = 'administrateur/images/proofs/'.$imageName;
                        Image::make($image_tmp)->save($imagePath);
                    }
                } else if(!empty($data['current_address_proof'])){
                    $imageName = $data['current_address_proof'];
                } else {
                    $imageName = "";
                }
    
                $vendorCount = VendorsBusinessDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)->count();
                if($vendorCount > 0){
                    // Mise à jour dans la table vendors_business_details
                    VendorsBusinessDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)
                        ->update([
                            'shop_name' => $data['shop_name'],
                            'shop_mobile' => $data['shop_mobile'],
                            'shop_address' => $data['shop_address'],
                            'shop_city' => $data['shop_city'],
                            'shop_state' => $data['shop_state'],
                            'shop_country' => $data['shop_country'],
                            'shop_pincode' => $data['shop_pincode'],
                            'business_license_number' => $data['business_license_number'],
                            'gst_number' => $data['gst_number'],
                            'pan_number' => $data['pan_number'],
                            'address_proof' => $data['address_proof'],
                            'address_proof_image' => $imageName
                        ]);
                } else {
                    VendorsBusinessDetail::insert([
                        'vendor_id' => Auth::guard('administrateur')->user()->vendor_id,
                        'shop_name' => $data['shop_name'],
                        'shop_mobile' => $data['shop_mobile'],
                        'shop_address' => $data['shop_address'],
                        'shop_city' => $data['shop_city'],
                        'shop_state' => $data['shop_state'],
                        'shop_country' => $data['shop_country'],
                        'shop_pincode' => $data['shop_pincode'],
                        'business_license_number' => $data['business_license_number'],
                        'gst_number' => $data['gst_number'],
                        'pan_number' => $data['pan_number'],
                        'address_proof' => $data['address_proof'],
                        'address_proof_image' => $imageName
                    ]);
                }
    
                return redirect()->back()->with('success_message', 'Les détails du vendeur ont été mis à jour avec succès !');
            }
            $vendorCount = VendorsBusinessDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)->count();
            if($vendorCount > 0){
                $vendorDetails = VendorsBusinessDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)->first()->toArray();
            } else {
                $vendorDetails = array();
            }
        } 
        else if($slug == "bank"){
            Session::put('page', 'update_bank_details');
            if($request->isMethod('post')){
                $data = $request->all();
    
                $rules = [
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name' => 'required',
                    'account_number' => 'required|numeric',
                    'bank_ifsc_code' => 'required',
                ];
    
                $customMessages = [
                    'account_holder_name.required' => "Le nom du titulaire du compte est requis",
                    'account_holder_name.regex' => "Un nom de titulaire valide est requis",
                    'bank_name.required' => "Le nom de la banque est requis",
                    'account_number.required' => "Le numéro de compte est requis",
                    'account_number.numeric' => "Un numéro de compte valide est requis",
                    'bank_ifsc_code.required' => "Le code IFSC de la banque est requis",
                ];
    
                $this->validate($request, $rules, $customMessages);
    
                $vendorCount = VendorsBankDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)->count();
                if($vendorCount > 0){
                    // Mise à jour dans la table vendors_bank_details
                    VendorsBankDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)
                        ->update([
                            'account_holder_name' => $data['account_holder_name'],
                            'bank_name' => $data['bank_name'],
                            'account_number' => $data['account_number'],
                            'bank_ifsc_code' => $data['bank_ifsc_code']
                        ]);
                } else {
                    VendorsBankDetail::insert([
                        'vendor_id' => Auth::guard('administrateur')->user()->vendor_id,
                        'account_holder_name' => $data['account_holder_name'],
                        'bank_name' => $data['bank_name'],
                        'account_number' => $data['account_number'],
                        'bank_ifsc_code' => $data['bank_ifsc_code']
                    ]);
                }
    
                return redirect()->back()->with('success_message', 'Les détails bancaires du vendeur ont été mis à jour avec succès !');
            }
    
            $vendorCount = VendorsBankDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)->count();
            if($vendorCount > 0){
                $vendorDetails = VendorsBankDetail::where('vendor_id', Auth::guard('administrateur')->user()->vendor_id)->first()->toArray();
            } else {
                $vendorDetails = array();
            }
        }
        $countries = Country::where('status', 1)->get()->toArray();
        return view('administrateur.settings.update_vendor_details')->with(compact('slug', 'vendorDetails', 'countries'));
    }
    
    public function updateVendorCommission(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Vendor::where('id', $data['vendor_id'])->update(['commission' => $data['commission']]);
            return redirect()->back()->with('success_message', 'La commission du vendeur a été mise à jour avec succès !');
        }
    }
    

    public function login(Request $request){
        // echo $password = Hash::make('123456'); die;
    
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
    
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
    
            $customMessages = [
                // Ajouter des messages personnalisés ici
                'email.required' => 'L\'email est requis !',
                'email.email' => 'Un email valide est requis',
                'password.required' => 'Le mot de passe est requis',
            ];
    
            $this->validate($request,$rules,$customMessages);
    
            /*if(Auth::guard('administrateur')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('administrateur/dashboard');
            }else{
                return redirect()->back()->with('error_message','Email ou mot de passe invalide');
            }*/
    
            if(Auth::guard('administrateur')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                if(Auth::guard('administrateur')->user()->type=="vendor" && Auth::guard('administrateur')->user()->confirm=="No"){
                    return redirect()->back()->with('error_message','Veuillez confirmer votre email pour activer votre compte de vendeur');
                }else if(Auth::guard('administrateur')->user()->type!="vendor" && Auth::guard('administrateur')->user()->status=="0"){
                    return redirect()->back()->with('error_message','Votre compte administrateuristrateur n\'est pas actif');
                }else{
                    return redirect('administrateur/dashboard');    
                }
            }else{
                return redirect()->back()->with('error_message','Email ou mot de passe invalide');
            }
        }
        return view('administrateur.login');
    }
    
    public function administrateurs($type=null){
        $administrateurs = administrateur::query();
        if(!empty($type)){
            $administrateurs = $administrateurs->where('type',$type);   
            $title = ucfirst($type)."s";
            Session::put('page','view_'.strtolower($title));
        }else{
            $title = "Tous les administrateuristrateurs/Sous-administrateuristrateurs/Vendeurs";
            Session::put('page','view_all');
        }
        $administrateurs = $administrateurs->get()->toArray();
        /*dd($administrateurs);*/
        return view('administrateur.administrateurs.administrateurs')->with(compact('administrateurs','title'));
    }
    
    public function viewVendorDetails($id){
        $vendorDetails = administrateur::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        /*dd($vendorDetails);*/
        return view('administrateur.administrateurs.view_vendor_details')->with(compact('vendorDetails'));
    }
    
    public function updateadministrateurStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if($data['status']=="Actif"){
                $status = 0;
            }else{
                $status = 1;
            }
            administrateur::where('id',$data['admin_id'])->update(['status'=>$status]);
            $administrateurDetails = administrateur::where('id',$data['admin_id'])->first()->toArray();
            if($administrateurDetails['type']=="vendor" && $status==1){
                Vendor::where('id',$administrateurDetails['vendor_id'])->update(['status'=>$status]);
                // Envoyer l'email d'approbation
                $email = $administrateurDetails['email'];
                $messageData = [
                    'email' => $administrateurDetails['email'],
                    'name' => $administrateurDetails['name'],
                    'mobile' => $administrateurDetails['mobile']
                ];
    
                Mail::send('emails.vendor_approved',$messageData,function($message)use($email){
                    $message->to($email)->subject('Le compte vendeur est approuvé');
                });
            }
    
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }
    
    public function logout(){
        Auth::guard('administrateur')->logout();
        return redirect('administrateur/login');
    }
    

}

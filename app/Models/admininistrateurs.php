<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admininistrateurs extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admininistrateurs';

    public function vendorPersonal(){
        return $this->belongsTo('App\Models\Vendor','vendor_id');
    }

    public function vendorBusiness(){
        return $this->belongsTo('App\Models\VendorsBusinessDetail','vendor_id');
    }

    public function vendorBank(){
        return $this->belongsTo('App\Models\VendorsBankDetail','vendor_id');
    }
}

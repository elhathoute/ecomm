<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Profiles;
use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\Product;
use Cart;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class ProfileComponent extends Component{
    
    use WithFileUploads;
    public $verify__email;
    public function mount(){
        if(Session::has('user')){
            $user_id=Session()->get('user')->id;
            $user=User::find($user_id);
            $this->email=$user->email;
            $this->email_verifyuser=$user->email;
            $this->old_image=$user->img;
            $profile=Profiles::where('user_id',$user_id)->first();
            //check if profile is not empty
            if(!empty($profile)){
                $this->first_name=$profile->fname;
                $this->last_name=$profile->lname;
                $this->address=$profile->address;
                $this->address2=$profile->address2;
                $this->province=$profile->province;  
                $this->street=$profile->street;
                $this->country=$profile->country;
                $this->city=$profile->city;
                $this->state=$profile->state;
                $this->zip=$profile->zip;
                $this->phone=$profile->phone;
            }

        }else{
            return redirect()->route('login');
        }

    }
    public $email;
    public $first_name;
    public $last_name;
    public $photo;
    public $street;
    public $old_img;
    public $address;
    public $address2;
    public $country;
    public $city;
    public $state;
    public $zip;
    public $phone;
    public $province;
    public $email_verifyuser;

    public function formss(){
        //save table profiles method create 
        $user_id=Session()->get('user')->id;
        //update profile orm 
        $profile=Profiles::where('user_id',$user_id)->update([
            'fname'=>$this->first_name,
            'lname'=>$this->last_name,
            'address'=>$this->address,
            'address2'=>$this->address2,
            'province'=>$this->province,
            'street'=>$this->street,
            'country'=>$this->country,
            'city'=>$this->city,
            'state'=>$this->state,
            'zip'=>$this->zip,
            'phone'=>$this->phone,
        ]);
        //update table users orm method
        $user=User::find($user_id);
        $user->email=$this->email;
        //check if photo is not empty
        if($this->photo){
            //upload photo using livewire 
            //$photo=$this->photo->store('users','public');
            //$user->img=$photo;

        }
        $user->save();
        session()->flash('message','Profile has been updated successfully!');
        //update table profiles orm method
    }
    public function render()
    
    {
        
        $user_id=Session()->get('user')->id;
        $profile=Profiles::where('user_id',$user_id)->first();
        //check if profile is empty
        if(empty($profile)){
            $profile=new Profiles();
            $profile->user_id=$user_id;
            $profile->city='';
            $profile->country='';
            $profile->state='';
            $profile->street='';
            $profile->zip='';
            $profile->phone='';
            $profile->fname='';
            $profile->lname='';
            $profile->save();
        }
        $user=User::find($user_id);
        //get all orders of user
        $orders=$user->orderItems;
        //get all products where product id is in $orders 
        //pluck('product_id') return array of product id 
        $producs_all=Product::all();
        $products=Product::whereIn('id',$orders->pluck('product_id'))->get();
        $images=Image::all();
        $country=Country::all();
        $city=City::all();
        
        return view('livewire.user.profile-component',[
            'user'=>$user,'countries'=>$country,'cities'=>$city,
            'products'=>$products,'images'=>$images,
            'producs_all'=>$producs_all
            ]
        );
    }
}

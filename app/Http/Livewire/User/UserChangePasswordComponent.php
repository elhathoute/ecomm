<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
//Hash 
use Illuminate\Support\Facades\Hash;
class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $confirm_password;
    public $password;
    public $save;



    

    //function validation update 
    public function updated($fields){
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password' => 'required',
        ]);
    }

    public function changePassword(){
        $this->validate([
            'current_password' => 'required',
            'password' => 'required',
        ]);
        //get user where
        $user=Session()->get('user');
        if(Hash::check($this->current_password,$user->password)){
            $user=User::findOrFail($user->id);
            $user->password =Hash::make($this->password);
            $user->save();
            session()->flash('message','Password has been changed successfully!');
        }else{
            session()->flash('password_message','Current password is not correct!');
        }
    }
    public function render(){
        //dd(Session()->get('user'));
        if($this->save){
            $this->validate([
                'current_password' => 'required',
                'password' => 'required',
            ]);
            $user=Session()->get('user');
            if(Hash::check($this->current_password,$user->password)){
                //check password mutch 
                if($this->password==$this->confirm_password){
                    $user=User::findOrFail($user->id);
                    $user->password =Hash::make($this->password);
                    $user->save();
                    session()->flash('message','Password has been changed successfully!');
                }else{
                    session()->flash('password_message','Password not mutch!');
                }
            }else{
                session()->flash('password_message','Current password is not correct!');
            }
        }
        return view('livewire.user.user-change-password-component');
    }
}

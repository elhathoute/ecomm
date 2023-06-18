<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;


class UsersComponent extends Component
{
    public function approve($id){
        $user=User::find($id);
        $user->utype='ADM';
        $user->save();
    }

    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
        session()->flash('message','User has been deleted successfully!');
    }

    public function status_user($id){
        $user=User::find($id);
        if($user->status==0){
            $user->status=1;
            $user->save();
        }else{
            $user->status=0;
            $user->save();
        }
    }
    public function render(){
        $users=User::all();
        return view('livewire.admin.users-component',['users'=>$users])->layout('layouts.base');
    }
}

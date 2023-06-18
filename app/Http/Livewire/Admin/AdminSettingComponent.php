<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $address2;
    public $map;
    public $facebook;
    public $twitter;
    public $instagram;
    public $youtube;
    public $pinterest;
    public $linkedin;
    public $whatsapp;
    public $telegram;
    public $save;

    public function mount(){
        $setting = Setting::find(1);
        $this->email = $setting->email;
        $this->phone = $setting->phone;
        $this->phone2 = $setting->phone2;
        $this->address = $setting->address;
        $this->address2 = $setting->address2;
        $this->map = $setting->map;
        $this->facebook = $setting->facebook;
        $this->twitter = $setting->twitter;
        $this->instagram = $setting->instagram;
        $this->youtube = $setting->youtube;
        $this->pinterest = $setting->pinterest;
        $this->linkedin = $setting->linkedin;
        $this->whatsapp = $setting->whatsapp;
        $this->telegram = $setting->telegram;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'map' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'pinterest' => 'required',
            'linkedin' => 'required',
            'whatsapp' => 'required',
            'telegram' => 'required',
        ]);
    }
    public function saveSettings(){
        
        //validation 
        
    }
    public function render(){
        if($this->save){
            $this->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'map' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'pinterest' => 'required',
            'linkedin' => 'required',
            'whatsapp' => 'required',
            'telegram' => 'required',
        ]);
        $setting = Setting::find(1);
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->address2 = $this->address2;
        $setting->map = $this->map;
        $setting->facebook = $this->facebook;
        $setting->twitter = $this->twitter;
        $setting->instagram = $this->instagram;
        $setting->youtube = $this->youtube;
        $setting->pinterest = $this->pinterest;
        $setting->linkedin = $this->linkedin;
        $setting->whatsapp = $this->whatsapp;
        $setting->telegram = $this->telegram;
        $setting->save();
        session()->flash('message','Settings has been updated successfully!');
        }
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}

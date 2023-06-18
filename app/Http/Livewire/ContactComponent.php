<?php

namespace App\Http\Livewire;

use Livewire\Component;
//model contact 
use App\Models\Contact;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'message'=>'required',
            'subject'=>'required'
        ]);
    }
    public function sendMessage(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'message'=>'required',
            'subject'=>'required'
        ]);

        //save in database 
        $contact=new Contact();
        $contact->name=$this->name;
        $contact->email=$this->email;
        $contact->phone=$this->phone;
        $contact->subject=$this->subject;
        $contact->message=$this->message;
        $contact->save();
        session()->flash('message','your message has been sent succesfly');
    }
    public function render()
    {
        return view('livewire.contact-component');
    }
}

<?php

namespace App\Http\Livewire\Admin;
use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{

    // Delete Contact
    public function deleteContact($id){
        $contact=Contact::find($id);
        $contact->delete();
        session()->flash('message','Contact has been deleted successfully!');
    }
    public function render(){
        $contacts=Contact::paginate(12);
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.base');
    }
}

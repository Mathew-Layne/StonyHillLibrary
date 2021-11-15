<?php

namespace App\Http\Livewire;

use App\Models\Member as ModelsMember;
use Livewire\Component;
use Livewire\WithPagination;

class Member extends Component
{
    use WithPagination;
    public $fname, $lname, $email, $address, $parish, $city;

    public function memberform(){
        $this->dispatchBrowserEvent('memberform');
    }

    public function addmember(){
        
        $member = new ModelsMember;
        $member->first_name = $this->fname;
        $member->last_name = $this->lname;
        $member->email = $this->email;
        $member->address = $this->address;
        $member->parish = $this->parish;
        $member->city = $this->city;        
        $member->save();   
        
        $this->dispatchBrowserEvent('closememberform');

    }

    public function render()
    {
        return view('livewire.member',[
            'members' => ModelsMember::paginate(5),
    ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\User;
use Livewire\Component;

class FormComponentFinance extends Component
{
    public $code_adherent;


    public $cotisation;

    public $searchTerm;
    
    public $searchResult = [];

    

    public function searchForAdherentByUuidOrName($uuid, $name, $limit){
        return User::query()
        ->where(function($query) {
            return $query->where('code_adherent', 'LIKE', "%{$this->searchTerm}%")
                            ->orWhere('firstname', 'LIKE', "%{$this->searchTerm}%")
                            ->orWhere('lastname', 'LIKE', "%{$this->searchTerm}%")
                            ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
                            ->orWhere('phone', 'LIKE', "%{$this->searchTerm}%");      
                    })->take($limit)
                        ->get();
                    
                        
                            
    }
    public function getCodeAdherent($id, $code){
        $this->code_adherent = $id;
        $this->searchTerm = $code;
    }
    public function updated(){
        
        $this->searchResult = $this->searchForAdherentByUuidOrName($this->searchTerm, $this->searchTerm, 10);

    } 

    public function formSubmit(){
        $finance = Finance::create([
            'code_adherent' => $this->code_adherent,
            'cotisation' => $this->cotisation
        ]);
        if ($finance){

            session()->flash('success', 'Financement ajoutée avec succées');
            return redirect()->route('financiere.index');
        }else{
            return back()->with('error', 'Il y aune erreur sil vous plais essayer plus tard');
        }
    }
    public function render()
    {
        return view('livewire.form-component-finance');
    }
}

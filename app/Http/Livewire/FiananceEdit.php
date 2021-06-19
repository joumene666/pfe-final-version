<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\User;
use Livewire\Component;

class FiananceEdit extends Component
{
    public $code_adherentP;
    public $code_adherent;

    public $finance;

    public $cotisation;

    public $searchTerm;
    
    public $searchResult = [];

    public function mount(){
        $this->code_adherentP = User::find($this->finance->code_adherent)->code_adherent;
        $this->code_adherent = User::find($this->finance->code_adherent)->id;

        // dd($this->code_adherent);
        $this->cotisation = $this->finance->cotisation;
    }

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
        $this->finance->update([
            'code_adherent' => $this->code_adherent,
            'cotisation' => $this->cotisation
        ]);
        if ($this->finance){

            session()->flash('success', 'Cotisation modifier avec succées');

            return redirect()->route('financiere.index');
            
        }else{
            return back()->with('error', 'Il y a une erreur s\'il vous plait essayer plus tard');
        }
    }
    public function render()
    {
        return view('livewire.fianance-edit');
    }
}

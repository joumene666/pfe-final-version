<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use Livewire\Component;
use Livewire\WithPagination;

class FinanceDatatable extends Component
{
    use WithPagination; 

    public $confirm;
    public $decline;
    public $showPopUp = true;
    public $idForDel;
    public $searchTerm;
    public $searchResult = [];

    public function updatingSearchTerm(){
        $this->resetPage();
    } 


    public function showPopUp($id){
        $this->idForDel = $id;
        $this->showPopUp = false;
    }

    public function cancel(){
        $this->idForDel = "";
        $this->showPopUp = true;
    }
    public function destroy(){
        
        $finance = Finance::find($this->idForDel);
        $finance->delete();
        $this->showPopUp = true;
    }


    public function render()
    {

        if(auth()->user()->type_adherent==="Simple Membre"){

            return view('livewire.finance-datatable', [
                'finances' => Finance::where('code_adherent', auth()->id())->get()
            ]);

        }

        return view('livewire.finance-datatable', [
            'finances' => Finance::all()
        ]);
        
        
    }
    
}

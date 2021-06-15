<?php

namespace App\Http\Livewire;

use App\Models\Structer;
use Livewire\Component;
use Livewire\WithPagination;

class StructerDatatable extends Component
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
        
        $structer = Structer::find($this->idForDel);
        $structer->delete();
        $this->showPopUp = true;
    }


    public function render()
    {
        
        return view('livewire.structer-datatable', [
            'structers' => Structer::query()
                                ->where(function($query) {
                                    return $query->where('code_structer', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('type_structure', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('matricule_fiscale', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('num_compte_bancaire', 'LIKE', "%{$this->searchTerm}%");
                                                    
                                })->paginate(10)
        ]);
    }
    
}

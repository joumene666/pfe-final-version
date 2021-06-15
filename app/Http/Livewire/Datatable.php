<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination; 

    public $confirm;
    public $decline;
    public $showPopUp = true;
    public $idForDel;
    public $searchTerm;
    public $searchResult = [];
    
    public function searchForAdherentByUuidOrName($uuid, $name){
        return User::query()
                ->where('team_id', auth()->user()->currentTeam->id)
                    ->where(function($query) use($uuid, $name) {
                        return $query->where('uuid', 'LIKE', "%{$uuid}%")
                                        ->orWhere('name', 'LIKE', "%{$name}%"); 
                    })->paginate(10);
                    
                        
                            
    }

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
        
        $adherent = User::find($this->idForDel);
        $adherent->delete();
        $this->showPopUp = true;
    }


    public function render()
    {
        
        return view('livewire.datatable', [
            'adherents' => User::query()
                                ->where(function($query) {
                                    return $query->where('code_adherent', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('firstname', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('lastname', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('email', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('phone', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('gender', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('cin', 'LIKE', "%{$this->searchTerm}%")
                                                    ->orWhere('profession', 'LIKE', "%{$this->searchTerm}%");
                                })->paginate(10)
        ]);
    }
    
}

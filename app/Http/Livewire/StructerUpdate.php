<?php

namespace App\Http\Livewire;

use App\Models\delegation;
use App\Models\gouvernerat;
use App\Models\secteur;
use App\Models\Structer;
use Livewire\Component;

class StructerUpdate extends Component
{
    public $gouvernerats = [];
    public $delegations = [];
    public $secteurs = [];
    public $code = "";
    public $date_creation = "";
    public $matricule_fiscale = "";
    public $num_compte_bancaire = "";
    public $changedGouv = "";
    public $type_structure = "";
    public $secteur_id = "";
    public $jort_creation = "";
    public $idStruct;
    public $structer;


    public function mount(){
        $this->code = $this->structer->code_structer;
        $this->date_creation = $this->structer->date_creation;
        $this->matricule_fiscale = $this->structer->matricule_fiscale;
        $this->num_compte_bancaire = $this->structer->num_compte_bancaire;
        
        $this->type_structure = $this->structer->type_structure;
        $this->secteur_id = $this->structer->secteur_id;
        $this->jort_creation = $this->structer->jort_creation;
        $this->idStruct = $this->structer->id;
    }


    public function changedGouv($id){


        $this->code = gouvernerat::where('id', $id)->firstOrFail()->code;

        $this->delegations = delegation::where('gouvernerat_id', $id)->get();

    }
    public function changedDel($id){
        $c = delegation::where('id', $id)->firstOrFail()->code;
        $this->code = "$this->code" . "$c";
        $this->secteurs = secteur::where('delegation_id', $id)->get();

    }

    public function changedSec($id){
        $c = secteur::where('id', $id)->firstOrFail()->code;
        $this->code = "$this->code" . "$c";

    }
    public function updateStructer(){
        $structer = Structer::find($this->idStruct);
        $structer->update([
            'date_creation' => $this->date_creation,
            'matricule_fiscale' => $this->matricule_fiscale,
            'code_structer' => $this->code,
            'num_compte_bancaire' => $this->num_compte_bancaire,
            'type_structure' => $this->type_structure,
            'secteur_id' => $this->secteur_id,
            'jort_creation' => $this->jort_creation
        ]);

        if ($structer){
            
            session()->flash("success", "Structure Modifié avec succées");

            return redirect()->route('structures.index');
           
        }else{
            return back()->with('error', 'Il y aune erreur sil vous plais essayer plus tard');
        }
    }

    public function render()
    {
        // dd($this->structer);
        
        $this->gouvernerats = gouvernerat::all();
        return view('livewire.structer-update');
    }
}

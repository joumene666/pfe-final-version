<?php

namespace App\Http\Controllers;

use App\Models\gouvernerat;
use App\Models\Structer;
use App\Models\User;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structers = Structer::all();
        return view('structure.index', [
            'structers' => $structers
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $gouvernerats = gouvernerat::all();

        return view('structure.create', [
            'gouvernerats' => $gouvernerats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(([
        //     'date_creation' => 'required',
        //     'type_structure' => 'required',
        //     'matricule-fiscale' => 'required',
        //     'jort-creation' => 'required',
        //     'num-compte-bancaire' => 'required',
        // ]));

        // $structer = Structer::create([
        //     'date_creation' => $request->firstname,
        //     'type_structure' => $request->lastname,
        //     'matricule-fiscale' => $request->profession,
        //     'jort-creation' => $request->nationality,
        //     'num-compte-bancaire' => $request->cin,
        // ]);

        // if ($structer){
        //     return back()->with('success', 'Structure ajoutée avec succées');
        // }else{
        //     return back()->with('error', 'Il y aune erreur sil vous plais essayer plus tard');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $structer = Structer::find($id);
        $members = User::where('structer_id', $id)->get();
        return view ('structure.show', [
            'structer' => $structer,
            'members' => $members
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $structer = Structer::find($id);

        
        return view('structure.edit', [
            'structer' => $structer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

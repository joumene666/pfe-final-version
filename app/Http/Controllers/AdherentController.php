<?php

namespace App\Http\Controllers;

use App\Models\Structer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdherentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adherents = User::all();

        return view('adherent.index', [
            'adherents' => $adherents
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $adherent = auth()->user(); 
        return view('auth.profile', [
            'adherent' => $adherent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $structers = Structer::all();

        if ($structers->count() === 0) {

            return view('adherent.empty');
        }
        return view('adherent.create', [
            'structers' => $structers
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
        $request->validate(([
            'firstname' => 'required',
            'lastname' => 'required',
            'profession' => 'required',
            'nationality' => 'required',
            'cin' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'date_naissance' => 'required',
            'joining_date' => 'required',
            'image' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:8|min:8',
            'code_structure' => 'required',
            'birth_place' => 'required',
            'password' => 'required',
            'commission' => 'required',
            'observation' => 'required',
        ]));

        $file = $request->file('image');
        $name = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('assets/images'), $name);

        $adherent = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'profession' => $request->profession,
            'nationality' => $request->nationality,
            'cin' => $request->cin,
            'gender' => $request->gender,
            'type_adherent' => $request->type,
            'birth_date' => $request->date_naissance,
            'joinning_date' => $request->joining_date,
            'image' => $name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'structer_id' => $request->code_structure,
            'place_birth' => $request->birth_place,
            'password' => Hash::make($request->password),
            'code_commession' => $request->commission,
            'observation' => $request->observation,

        ]);
        $code_structure = Structer::find($request->code_structure);

        $adherent->update([
            'code_adherent' => $code_structure->code_structer . '00' . $adherent->id
        ]);

        if ($adherent) {

            return back()->with('success', 'Adherent ajoutée avec succées');
        } else {
            return back()->with('error', 'Il y\'a une erreur s\'il vous plait essayer plus tard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adherent = User::find($id);
        return view('adherent.show', [
            'adherent' => $adherent
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

        $structers = Structer::all();
        $adherent = User::find($id);

        return view('adherent.edit', [
            'adherent' => $adherent,
            'structers' => $structers
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
        $request->validate(([
            'firstname' => 'required',
            'lastname' => 'required',
            'profession' => 'required',
            'nationality' => 'required',
            'cin' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'date_naissance' => 'required',
            'joining_date' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'code_structure' => 'required',
            'birth_place' => 'required',
            'commission' => 'required',
            'observation' => 'required',
        ]));
        $adherent = User::find($id);
        $file = $request->file('image');
        if ($file) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/images'), $name);
            $adherent->update([
                'image' => $name
            ]);
        }
        $adherent->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'profession' => $request->profession,
            'nationality' => $request->nationality,
            'cin' => $request->cin,
            'gender' => $request->gender,
            'type_adherent' => $request->type,
            'birth_date' => $request->date_naissance,
            'joinning_date' => $request->joining_date,
            'email' => $request->email,
            'phone' => $request->phone,
            'structer_id' => $request->code_structure,
            'place_birth' => $request->birth_place,
            'code_commession' => $request->commission,
            'observation' => $request->observation,
        ]);
        $code_structure = Structer::find($request->code_structure);

        $adherent->update([
            'code_adherent' => $code_structure->code_structer . '00' . $adherent->id
        ]);


        if ($adherent) {

            return redirect()->route('adherent.index')->with('success', 'Adherent Modifié avec succées');
            // return back()->with('success', 'Adherent Modifié avec succées');
        } else {
            return back()->with('error', 'Il y a une erreur s\'il vous plait réessayer plus tard');
        }
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

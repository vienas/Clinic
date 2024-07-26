<?php

namespace App\Http\Controllers;

use App\Models\Klinika;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {

        $klinika = Klinika::all();
        return view('patient.index', ['klinika' => $klinika ]);
    }
    
    public function dodaj()
    {
        return view('patient.create');
    }

    public function edit($id)
    {
        $klinika = Klinika::find($id);
        return view('patient.edit', ['klinika' => $klinika ]);
    }

    public function store(Request $request)
    {
        $klinika = new Klinika();
        
        $klinika->name = $request->name;
        $klinika->date = $request->date;
        $klinika->phone = $request->phone;
        $klinika->mail = $request->mail;
        $klinika->doctor = $request->doctor;

        $klinika->save();

        return redirect()->route('patient.index')->with('message', 'Rejestracja pacjenta wykonana poprawnie');
        
    }

    public function update($id, Request $request)
    {
        $klinika = Klinika::find($id);
        
        $klinika->name = $request->name;
        $klinika->date = $request->date;
        $klinika->phone = $request->phone;
        $klinika->mail = $request->mail;
        $klinika->doctor = $request->doctor;

        $klinika->save();

        return redirect()->route('patient.index')->with('message', 'Zmiany zostały zapisane');
    }

    public function delete($id)
    {
        klinika::destroy($id);

        return redirect()->route('patient.index')->with('message', 'Poprawnie usunięto z bazy');
    }

}

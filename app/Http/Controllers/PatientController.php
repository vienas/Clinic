<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    public function index()
    {
        $clinic = Clinic::all();
        return view('patient.index', ['clinic' => $clinic ]);
    }
    
    public function create()
    {
        $users = User::all();
        return view('patient.create', ['users' => $users]);
    }

    public function edit(int $id)
    {
        $users = User::all();
        $clinic = Clinic::findOrFail($id);
        return view('patient.edit', ['clinic' => $clinic, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'date' => 'required|date',
            'phone' => 'required|string|min:9|max:9',
            'mail' => 'nullable|email|max:255',
            'doctor' => 'required|string|max:255',
        ]);
    
        $clinic = new Clinic();
    
        $clinic->name = $validatedData['name'];
        $clinic->date = $validatedData['date'];
        $clinic->phone = $validatedData['phone'];
        $clinic->mail = $validatedData['mail'];
        $clinic->doctor = $validatedData['doctor'];
    
        $clinic->save();
    
        return redirect()->route('patient.create')->with('message', 'Twoja wizyta została zarejestrowana, dziękujemy!');
    }
    

    public function update(int $id, Request $request)
    {
        $clinic = Clinic::findOrFail($id);
        
        $clinic->name = $request->name;
        $clinic->date = $request->date;
        $clinic->phone = $request->phone;
        $clinic->mail = $request->mail;
        $clinic->doctor = $request->doctor;
    
        $clinic->save();
    
        return redirect()->route('patient.index')->with('message', 'Zmiany zostały zapisane');
    }
    

    public function delete(int $id)
    {
        Clinic::destroy($id);

        return redirect()->route('patient.index')->with('message', 'Poprawnie usunięto z bazy');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;


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
            'name' => 'required|string|max:30|regex:/^\S.*$/',
            'date' => 'required|date|after_or_equal:today',
            'phone' => 'required|string|min:9|max:9',
            'mail' => 'nullable|email|max:30',
            'doctor' => 'required|string|max:50',
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:30|regex:/^\S.*$/',
            'date' => 'required|date|after_or_equal:today',
            'phone' => 'required|string|min:9|max:9',
            'mail' => 'nullable|email|max:30',
            'doctor' => 'required|string|max:50',
        ]);

        $clinic = Clinic::findOrFail($id);
        
        $clinic->name = $validatedData['name'];
        $clinic->date = $validatedData['date'];
        $clinic->phone = $validatedData['phone'];
        $clinic->mail = $validatedData['mail'];
        $clinic->doctor = $validatedData['doctor'];
    
        $clinic->save();
    
        Mail::to('mail.com')->send(new RegistrationConfirmation());

        return redirect()->route('patient.index')->with('message', 'Zmiany zostały zapisane');
    }
    

    public function delete(int $id)
    {
        Clinic::destroy($id);

        return redirect()->route('patient.index')->with('message', 'Poprawnie usunięto z bazy');
    }

}

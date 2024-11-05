<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;




class PatientController extends Controller
{
    public function index()
    {
        $clinic = Clinic::paginate(15);
        return view('patient.index', ['clinic' => $clinic ]);
    }
    
    public function create()
    {
        $users = User::all();
        $clinic = Clinic::all();
        return view('patient.create', ['clinic' => $clinic, 'users' => $users]);
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
            'mail' => 'required|email|max:30',
            'doctor_id' => 'required',
        ]);
    
        $clinic = new Clinic();
    
        $clinic->name = $validatedData['name'];
        $clinic->date = $validatedData['date'];
        $clinic->phone = $validatedData['phone'];
        $clinic->mail = $validatedData['mail'];
        $clinic->doctor_id = $validatedData['doctor_id'];
    
        $clinic->save();
    
        return redirect()->route('patient.create')->with('message', 'Twoja wizyta została zarejestrowana, dziękujemy!');
    }
    
    public function update(int $id, Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required|string|max:30|regex:/^\S.*$/',
            'date' => 'required|date|after_or_equal:today',
            'phone' => 'required|string|min:9|max:9',
            'mail' => 'required|email|max:30',
            'doctor_id' => 'required',
        ]);

        $clinic = Clinic::findOrFail($id);
        
        $clinic->name = $validatedData['name'];
        $clinic->date = $validatedData['date'];
        $clinic->phone = $validatedData['phone'];
        $clinic->mail = $validatedData['mail'];
        $clinic->doctor_id = $validatedData['doctor_id'];
    
        $clinic->save();
    
        if ($clinic->mail) {
            
            Mail::to($clinic->mail)->send(new RegistrationConfirmation($clinic,));
        }

        return redirect()->route('patient.index')->with('message', 'E-mail z potwierdzeniem rejestracji został wysłany do pacjenta.');
    }
    
    public function editmy()
    {
        $clinic = Clinic::where('doctor_id', Auth::user()->id)->get();
        $users = User::all();
        return view('patient.editmy', ['clinic' => $clinic, 'users' => $users ]);
    }
    
    public function delete(int $id)
    {
        Clinic::destroy($id);

        return redirect()->route('patient.index')->with('message', 'Poprawnie usunięto z bazy');
    }

}

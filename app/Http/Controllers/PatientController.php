<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
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
        return view('patient.create');
    }

    public function edit($id)
    {
        $clinic = Clinic::find($id);
        return view('patient.edit', ['clinic' => $clinic ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'phone' => 'required|string|min:9|max:9',
            'mail' => 'nullable|string|max:255',
            'doctor' => 'required|string|max:255',
        ]);
    
        $clinic = new Clinic();
    
        $clinic->name = $validatedData['name'];
        $clinic->date = $validatedData['date'];
        $clinic->phone = $validatedData['phone'];
        $clinic->mail = $validatedData['mail'];
        $clinic->doctor = $validatedData['doctor'];
    
        $clinic->save();
    
        return redirect()->route('patient.create')->with('message', 'Zarejestrowano, dziękujemy!');
    }
    

    public function update($id, Request $request)
    {
        $clinic = Clinic::find($id);
        
        $clinic->name = $request->name;
        $clinic->date = $request->date;
        $clinic->phone = $request->phone;
        $clinic->mail = $request->mail;
        $clinic->doctor = $request->doctor;

        $clinic->save();

        return redirect()->route('patient.index')->with('message', 'Zmiany zostały zapisane');
    }

    public function delete($id)
    {
        Clinic::destroy($id);

        return redirect()->route('patient.index')->with('message', 'Poprawnie usunięto z bazy');
    }

}

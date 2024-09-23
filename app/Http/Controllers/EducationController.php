<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::with('personalData')->get();
        return view('education.index', compact('education'));
    }

    public function create()
    {
        $personalData = PersonalData::all(); // Para obtener los ids de las personas
        return view('education.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|max:255',
            'level' => 'required|max:255',
            'area' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        Education::create($request->all());

        return redirect()->route('education.index')->with('success', 'Registro creado exitosamente');
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        $personalData = PersonalData::all();
        return view('education.edit', compact('education', 'personalData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'institution' => 'required|max:255',
            'level' => 'required|max:255',
            'area' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        $education = Education::findOrFail($id);
        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Registro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Registro eliminado exitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ComplementaryEducation;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class ComplementaryEducationController extends Controller
{
    public function index()
    {
        $complementaryEducations = ComplementaryEducation::with('personalData')->get();
        return view('complementary_education.index', compact('complementaryEducations'));
    }

    public function create()
    {
        $personalData = PersonalData::all();
        return view('complementary_education.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'institution' => 'required|max:255',
            'year' => 'required|digits:4',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        ComplementaryEducation::create($request->all());

        return redirect()->route('complementary_education.index')->with('success', 'Registro creado correctamente');
    }

    public function edit(ComplementaryEducation $complementaryEducation)
    {
        $personalData = PersonalData::all();
        return view('complementary_education.edit', compact('complementaryEducation', 'personalData'));
    }

    public function update(Request $request, ComplementaryEducation $complementaryEducation)
    {
        $request->validate([
            'name' => 'required|max:255',
            'institution' => 'required|max:255',
            'year' => 'required|digits:4',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        $complementaryEducation->update($request->all());

        return redirect()->route('complementary_education.index')->with('success', 'Registro actualizado correctamente');
    }

    public function destroy(ComplementaryEducation $complementaryEducation)
    {
        $complementaryEducation->delete();
        return redirect()->route('complementary_education.index')->with('success', 'Registro eliminado correctamente');
    }
}

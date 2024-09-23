<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::with('personalData')->get();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        $personalData = PersonalData::all(); // Para obtener los ids de las personas
        return view('languages.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language' => 'required|max:255',
            'level' => 'required|max:255',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        Language::create($request->all());

        return redirect()->route('languages.index')->with('success', 'Registro creado exitosamente');
    }

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        $personalData = PersonalData::all();
        return view('languages.edit', compact('language', 'personalData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'language' => 'required|max:255',
            'level' => 'required|max:255',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        $language = Language::findOrFail($id);
        $language->update($request->all());

        return redirect()->route('languages.index')->with('success', 'Registro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('languages.index')->with('success', 'Registro eliminado exitosamente');
    }
}

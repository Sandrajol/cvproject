<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::with('personalData')->get();
        return view('research.index', compact('researches'));
    }

    public function create()
    {
        $personalData = PersonalData::all();
        return view('research.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        Research::create($request->all());

        return redirect()->route('research.index');
    }

    public function edit(Research $research)
    {
        $personalData = PersonalData::all();
        return view('research.edit', compact('research', 'personalData'));
    }

    public function update(Request $request, Research $research)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        $research->update($request->all());

        return redirect()->route('research.index');
    }

    public function destroy(Research $research)
    {
        $research->delete();
        return redirect()->route('research.index');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::with('personalData')->get();
        return view('awards.index', compact('awards'));
    }

    public function create()
    {
        $personalData = PersonalData::all();
        return view('awards.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'award' => 'required|max:255',
            'institution' => 'required|max:255',
            'year' => 'required|numeric|min:1900|max:' . date('Y'),
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        Award::create($request->all());

        return redirect()->route('awards.index')->with('success', 'Award created successfully.');
    }

    public function edit(Award $award)
    {
        $personalData = PersonalData::all();
        return view('awards.edit', compact('award', 'personalData'));
    }

    public function update(Request $request, Award $award)
    {
        $request->validate([
            'award' => 'required|max:255',
            'institution' => 'required|max:255',
            'year' => 'required|numeric|min:1900|max:' . date('Y'),
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        $award->update($request->all());

        return redirect()->route('awards.index')->with('success', 'Award updated successfully.');
    }

    public function destroy(Award $award)
    {
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
    }
}


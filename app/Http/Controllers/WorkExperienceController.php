<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $workExperiences = WorkExperience::with('personalData')->get();
        return view('work_experience.index', compact('workExperiences'));
    }

    public function create()
    {
        $personalData = PersonalData::all();
        return view('work_experience.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|max:255',
            'position' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        WorkExperience::create($request->all());

        return redirect()->route('work_experience.index');
    }

    public function edit(WorkExperience $workExperience)
    {
        $personalData = PersonalData::all();
        return view('work_experience.edit', compact('workExperience', 'personalData'));
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $request->validate([
            'company' => 'required|max:255',
            'position' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'personal_data_id' => 'required|exists:personal_data,id',
        ]);

        $workExperience->update($request->all());

        return redirect()->route('work_experience.index');
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->route('work_experience.index');
    }
}


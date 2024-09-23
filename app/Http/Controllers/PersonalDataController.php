<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    public function index()
    {
        $personalData = PersonalData::all();
        return view('personal_data.index', compact('personalData'));
    }

    public function create()
    {
        return view('personal_data.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|string|unique:personal_data',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        PersonalData::create($request->all());

        return redirect()->route('personal_data.index');

    }

    public function edit($id)
    {
        $personalData = PersonalData::findOrFail($id);
        return view('personal_data.edit', compact('personalData'));
    }

    public function update(Request $request, $id)
    {
        $personalData = PersonalData::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|string|unique:personal_data,identification,' . $personalData->id,
            'birth_date' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $personalData->update($request->all());

        return redirect()->route('personal_data.index')->with('success', 'Personal data updated successfully!');
    }

    public function destroy($id)
    {
        $personalData = PersonalData::findOrFail($id);
        $personalData->delete();

        return redirect()->route('personal_data.index')->with('success', 'Personal data deleted successfully!');
    }
}

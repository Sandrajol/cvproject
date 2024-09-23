<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalProfile;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class ProfessionalProfileController extends Controller
{
    public function index()
    {
        $profiles = ProfessionalProfile::with('personalData')->get();
        return view('professional_profile.index', compact('profiles'));
    }

    public function create()
    {
        $personalData = PersonalData::all(); // Obtén todos los registros de personal_data
        return view('professional_profile.create', compact('personalData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Profile' => 'required|max:500',
            'personal_data_id' => 'required|exists:personal_data,id'
        ]);

        ProfessionalProfile::create([
            'Profile' => $request->Profile,
            'personal_data_id' => $request->personal_data_id
        ]);

        return redirect()->route('professional_profile.index')->with('success', 'Professional profile created successfully!');
    }

    public function edit($id)
    {
        $profile = ProfessionalProfile::findOrFail($id);
        $personalData = PersonalData::all(); // Para mostrar los IDs de la tabla personal_data
        return view('professional_profile.edit', compact('profile', 'personalData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Profile' => 'required|max:500',
            'personal_data_id' => 'required|exists:personal_data,id'
        ]);

        $profile = ProfessionalProfile::findOrFail($id);
        $profile->update($request->all());

        return redirect()->route('professional_profile.index')->with('success', 'Professional profile updated successfully!');
    }

    public function destroy($id)
    {
        $profile = ProfessionalProfile::findOrFail($id);
        $profile->delete();

        return redirect()->route('professional_profile.index')->with('success', 'Professional profile deleted successfully!');
    }
}


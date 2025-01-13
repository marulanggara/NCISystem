<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    // Show crew data
    public function index()
    {
        $crews = Crew::all();
        return view('crews.index', compact('crews'));
    }

    // Add new crew
    public function create()
    {
        return view('crews.create');
    }

    // Store crew data to database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'maps_id' => 'required',
            'name' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required',
            'seamanbook_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'passport_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'medical_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'certificate_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'born_date' => 'required',
            'experience' => 'nullable|string',
            'address' => 'required',
            'next_of_kind' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        // Ambil data input dari request
        $data = $request->except('experience');

        // Upload files jika ada dan simpan di folder public
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile/pictures', 'public');
        }
        if ($request->hasFile('seamanbook_file_path')) {
            $data['seamanbook_file_path'] = $request->file('seamanbook_file_path')->store('documents/seamanbooks', 'public');
        }
        if ($request->hasFile('passport_file_path')) {
            $data['passport_file_path'] = $request->file('passport_file_path')->store('documents/passport', 'public');
        }
        if ($request->hasFile('medical_file_path')) {
            $data['medical_file_path'] = $request->file('medical_file_path')->store('documents/medical', 'public');
        }
        if ($request->hasFile('certificate_file_path')) {
            $data['certificate_file_path'] = $request->file('certificate_file_path')->store('documents/certificates', 'public');
        }

        // Simpan data crew
        $crew = Crew::create($data);

        // Simpan pengalaman jika ada
        if ($request->has('experience')) {
            $experiences = explode(',', $request->experience); // Pisahkan pengalaman dengan koma
            foreach ($experiences as $experience) {
                $crew->experiences()->create(['experience_name' => trim($experience)]);
            }
        }

        // Redirect dengan pesan sukses
        return redirect()->route('crews.index')->with('success', 'Crew created successfully.');
    }

    // Show detail crew data
    public function show($id)
    {
        $crew = Crew::find($id);
        return view('crews.show', compact('crew'));
    }

    // Edit crew data
    public function edit($id)
    {
        $crew = Crew::find($id);
        return view('crews.edit', compact('crew'));
    }

    // Update crew data
    public function update(Request $request, $id)
    {
        $crew = Crew::find($id);
        $crew->update($request->all());

        return redirect()->route('crews.index')->with('success', 'Crew updated successfully.');
    }

    // Delete crew data
    public function destroy($id)
    {
        $crew = Crew::find($id);
        $crew->delete();

        return redirect()->route('crews.index')->with('success', 'Crew deleted successfully.');
    }
}

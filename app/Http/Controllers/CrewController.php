<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrewController extends Controller
{
    // Show crew data
    public function index(Request $request)
    {
        // Get the search query if it exists
        $search = $request->input('search');

        // Query the Crew model with pagination
        $crews = Crew::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('position', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })->paginate(25); // Limit to 25 items per page

        return view('dashboard.dashboard', compact('crews'));
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
            'office' => 'required|in:Jakarta,Bandung,Surabaya,Yogyakarta,Bali',
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
            $filename = 'File_Seaman_Book_' . time() . '.' . $request->file('seamanbook_file_path')->getClientOriginalExtension();
            $data['seamanbook_file_path'] = $request->file('seamanbook_file_path')->storeAs('documents/seamanbooks', $filename, 'public');
        }
        if ($request->hasFile('passport_file_path')) {
            $filename = 'File_Passport_' . time() . '.' . $request->file('passport_file_path')->getClientOriginalExtension();
            $data['passport_file_path'] = $request->file('passport_file_path')->storeAs('documents/passport', $filename, 'public');
        }
        if ($request->hasFile('medical_file_path')) {
            $filename = 'File_Medical_' . time() . '.' . $request->file('medical_file_path')->getClientOriginalExtension();
            $data['medical_file_path'] = $request->file('medical_file_path')->storeAs('documents/medical', $filename, 'public');
        }
        if ($request->hasFile('certificate_file_path')) {
            $filename = 'File_Certificate_' . time() . '.' . $request->file('certificate_file_path')->getClientOriginalExtension();
            $data['certificate_file_path'] = $request->file('certificate_file_path')->storeAs('documents/certificate', $filename, 'public');
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
        return redirect()->route('dashboard')->with('success', 'Crew created successfully.');
    }

    // Show detail crew data
    public function show($id)
    {
        $crew = Crew::with('experiences')->findOrFail($id);
        return view('crews.show', compact('crew'));
    }

    // Edit crew data
    public function edit($id)
    {
        $crew = Crew::find($id);
        return view('crews.edit', compact('crew'));
    }

    // Update data address, next of kind, phone, email crew
    public function update(Request $request, $id)
    {
        $crew = Crew::findOrFail($id);

        // Validasi data
        $request->validate([
            'address' => 'nullable',
            'next_of_kind' => 'nullable',
            'phone' => 'nullable',
            'experience_name.*' => 'nullable|string', // Validate each experience name
            'seamanbook_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'passport_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'medical_file_path' => 'nullable|file|mimes:pdf|max:2048',
            'certificate_file_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Ambil data input yang diubah
        $crewData = [];

        // Handle non-file fields like address, next of kind, phone only if they are not empt
        if ($request->has('address')) {
            $crewData['address'] = $request->input('address');
        }
        if ($request->has('next_of_kind')) {
            $crewData['next_of_kind'] = $request->input('next_of_kind');
        }
        if ($request->has('phone')) {
            $crewData['phone'] = $request->input('phone');
        }

        // Check if new files are uploaded, and update only those fields
        if ($request->hasFile('seamanbook_file_path')) {
            // Delete old file if exists
            if ($crew->seamanbook_file_path) {
                Storage::delete($crew->seamanbook_file_path);
            }
            // Store the new file with a unique name
            $filename = 'File_Seaman_Book_' . time() . '.' . $request->file('seamanbook_file_path')->getClientOriginalExtension();
            $crewData['seamanbook_file_path'] = $request->file('seamanbook_file_path')->storeAs('documents/seamanbooks', $filename, 'public');
        }
        if ($request->hasFile('passport_file_path')) {
            // Delete old file if exists
            if ($crew->passport_file_path) {
                Storage::delete($crew->passport_file_path);
            }
            // Store the new file with a unique name
            $filename = 'File_Passport_' . time() . '.' . $request->file('passport_file_path')->getClientOriginalExtension();
            $crewData['passport_file_path'] = $request->file('passport_file_path')->storeAs('documents/passport', $filename, 'public');
        }
        if ($request->hasFile('medical_file_path')) {
            // Delete old file if exists
            if ($crew->medical_file_path) {
                Storage::delete($crew->medical_file_path);
            }
            // Store the new file with a unique name
            $filename = 'File_Medical_' . time() . '.' . $request->file('medical_file_path')->getClientOriginalExtension();
            $crewData['medical_file_path'] = $request->file('medical_file_path')->storeAs('documents/medical', $filename, 'public');
        }
        if ($request->hasFile('certificate_file_path')) {
            // Delete old file if exists
            if ($crew->certificate_file_path) {
                Storage::delete($crew->certificate_file_path);
            }
            // Store the new file with a unique name
            $filename = 'File_Certificate_' . time() . '.' . $request->file('certificate_file_path')->getClientOriginalExtension();
            $crewData['certificate_file_path'] = $request->file('certificate_file_path')->storeAs('documents/certificate', $filename, 'public');
        }

        // Update data crew
        $crew->update($crewData);

        // Update pengalaman
        if ($request->has('experience_name')) {
            $experienceNames = $request->input('experience_name');
            $experienceIds = $request->input('experience_id');

            foreach ($experienceNames as $index => $experienceName) {
                // Make sure the experience name is not null or empty
                if (empty($experienceName)) {
                    continue; // Skip if experience name is empty
                }
                if (isset($experienceIds[$index])) {
                    // Update existing experience
                    $experience = $crew->experiences()->find($experienceIds[$index]);
                    if ($experience) {
                        $experience->update(['experience_name' => $experienceName]);
                    }
                } else {
                    // If no ID is provided, you can choose to create a new experience
                    if ($crew->experiences->count() < 3) {
                        $crew->experiences()->create(['experience_name' => $experienceName]);
                    }
                }
            }
        }

        return redirect()->route('crews.show', $id)->with('success', 'Crew updated successfully.');
    }

    // Search crew data
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search crew berdasarkan query
        $crews = Crew::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(position) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(email) LIKE ?', ['%' . strtolower($search) . '%'])
            ->paginate(25); // Limit to 25 items per page

        return view('dashboard.dashboard', compact('crews'));
    }

    // Delete crew data
    public function destroy($id)
    {
        // Mencari data crew berdasarkan ID
        $crew = Crew::find($id);

        // Jika crew tidak ditemukan
        if (!$crew) {
            return redirect()->route('crews.index')->with('error', 'Crew not found.');
        }

        // Menghapus dokumen yang telah di-upload jika ada
        if ($crew->seamanbook_file_path) {
            Storage::delete($crew->seamanbook_file_path);
        }
        if ($crew->passport_file_path) {
            Storage::delete($crew->passport_file_path);
        }
        if ($crew->medical_file_path) {
            Storage::delete($crew->medical_file_path);
        }
        if ($crew->certificate_file_path) {
            Storage::delete($crew->certificate_file_path);
        }

        // Menghapus record crew dari database
        $crew->delete();

        // Redirect ke halaman crew index dengan pesan sukses
        return redirect()->route('crews.index')->with('success', 'Crew deleted successfully.');
    }
}

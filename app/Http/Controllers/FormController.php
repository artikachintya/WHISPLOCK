<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPengaduanRequest;
use App\Models\Report;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPengaduanRequest $request)
    {
          // Cek kalau ada file evidence
        if ($request->hasFile('evidence')) {
            // Bikin nama file unik
            $fileName = time() . '.' . $request->file('evidence')->extension();

            // Simpan ke folder storage/app/public/evidence
            $request->file('evidence')->storeAs('public/evidence', $fileName);

            // Simpan nama file ke dalam database
            $data['evidence'] = $fileName;
        }

        // dd($request);
        // dd($data);
        Report::create([
            'reported_person_name' => $request['reported_person_name'],
            'incident_time' => $request['incident_time'],
            'incident_chronology' => $request['incident_chronology'],
            'evidence' => $data['evidence'] ?? null,
            'status' => -1, // default: Menunggu
        ]);

        return redirect()->route('form.index')->with('success', 'Pengaduan berhasil!');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

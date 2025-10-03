<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $reports = Report::all();
        // dd($reports);
        return view('admin.dashboard', compact('reports'));
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
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, String $id)
{
    $request->validate([
        'new_status' => 'required|in:-1,0,1',
        'notes'      => 'nullable|string|max:1000',
    ]);

    $report = Report::findOrFail($id);
    $report->status = $request->new_status;
    $report->response  = $request->response; // sesuai dengan field form & DB
    $report->save();

    return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

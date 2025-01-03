<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Imports\CandidatesImport;
use Maatwebsite\Excel\Facades\Excel;

class CandidateController extends Controller
{
    // Import Candidate
    public function import(StoreCandidateRequest $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:xlsx',
        // ]);

        Excel::import(new CandidatesImport, $request->file('file'));

        return back()->with('success', 'Users imported successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('candidate.xlupload');
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
    public function store(StoreCandidateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}

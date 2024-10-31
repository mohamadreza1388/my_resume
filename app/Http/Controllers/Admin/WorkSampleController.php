<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkSample;
use Illuminate\Http\Request;

class WorkSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_samples = WorkSample::all();

       return view('admin.work_samples.index', compact('work_samples'));
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
        $request->validate([
            "title" => "string",
            "description" => "string",
            "thumbnail" => "string",
            "url" => "string"
        ]);

        WorkSample::create([
            "title" => $request->title,
            "description" => $request->description,
            "thumbnail" => $request->thumbnail,
            "url" => $request->url
        ]);

        return redirect()->route('admin.work_samples.index');
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
    public function edit(WorkSample $work_sample)
    {
        return view('admin.work_samples.edit', compact('work_sample'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkSample $work_sample)
    {
        $request->validate([
            "title" => "string",
            "description" => "string",
            "thumbnail" => "string",
            "url" => "string"
        ]);

        $work_sample->update([
            "title" => $request->title,
            "description" => $request->description,
            "thumbnail" => $request->thumbnail,
            "url" => $request->url
        ]);

        return redirect()->route('admin.work_samples.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkSample $work_sample)
    {
        $work_sample->delete();

        return back();
    }
}

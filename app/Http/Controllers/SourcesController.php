<?php

namespace App\Http\Controllers;

use App\Models\Sources;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sources::paginate(5);
        $sourcesCode = Sources::createCode();
        return view('page.sources.index', compact('sourcesCode'))->with([
            'data' => $data,
        ]);
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
        $data = [
            'source_code' => $request->input('sources_code'),
            'source' => $request->input('sources')
        ];

        Sources::create($data);

        return redirect()
            ->route('sources.index')
            ->with('message_add', 'Data Sudah ditambahkan');
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
        $data = [
            'source' => $request->input('sources')
        ];

        $datas = Sources::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('sources.index')
            ->with('message_update', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sources::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Sudah dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Major;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Classes::paginate(5);
        $major = Major::all();
        $classesCode = Classes::createCode();
        return view('page.classes.index', compact('classesCode'))->with([
            'data' => $data,
            'major' => $major,
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
            'class_code' => $request->input('classes_code'),
            'major_code' => $request->input('major_code'),
            'classes' => $request->input('classes')
        ];

        Classes::create($data);

        return redirect()
            ->route('classes.index')
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
            'major_code' => $request->input('major_code'),
            'classes' => $request->input('classes')
        ];

        $datas = Classes::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('classes.index')
            ->with('message_update', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Classes::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Sudah dihapus');
    }
}

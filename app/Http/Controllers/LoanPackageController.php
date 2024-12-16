<?php

namespace App\Http\Controllers;

use App\Models\LoanPackages;
use Illuminate\Http\Request;

class LoanPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LoanPackages::paginate(5);
        $loanPackageCode = LoanPackages::createCode();
        return view('page.loanPackage.index', compact('loanPackageCode'))->with([
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
            'package_code' => $request->input('package_code'),
            'package' => $request->input('package')
        ];

        LoanPackages::create($data);

        return redirect()
            ->route('loanPackages.index')
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
            'package' => $request->input('package')
        ];

        $datas = LoanPackages::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('loanPackages.index')
            ->with('message_update', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = LoanPackages::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Sudah dihapus');
    }
}

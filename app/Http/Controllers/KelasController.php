<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {
        return view('kelas.index',
        [
            'title' => 'kelas',
            'active' => 'kelas',
            "kelas" => Kelas::all()
        ]
    );}

    public function create() {
        return view('kelas.create', [
            "title" => "Add New Kelas",
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            "kelas" => "required"
        ]);

        $result = Kelas::create($validateData);
        if($result) {
            return redirect('/dashboard/kelas')->with('success', 'New kelas data has been added!');
        }
    }

    public function destroy(Kelas $kelas) {
        $result = Kelas::destroy($kelas->id);   
        if($result) {
            return redirect('/dashboard/kelas')->with('success', 'Kelas data has been deleted!');
        } else {
            return redirect('/dashboard/kelas')->with('error', 'Kelas data failed to delete!');
        }
    }

    public function edit(Kelas $kelas) {
        return view('kelas.edit', [
            'kelas' => $kelas,
            "title" => "Edit Kelas",
        ]);
    }

    public function update(Request $request, Kelas $kelas) {
        $request->validate([
            "kelas" => "required",
        ]);

        $kelas->update([
            "kelas" => $request->kelas,
        ]);

        return redirect('/dashboard/kelas')->with('success', 'Kelas data has been updated!');
    }
}
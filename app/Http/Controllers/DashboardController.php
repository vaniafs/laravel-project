<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.student.index',[
            'students' => Student::latest()->filter(request(['search']))->paginate(5)
        ]);
    }

    public function view()
    {
        $kelas = Kelas::query();

        if (request()->has('search') && request('search')) {
            $kelas->filter(['search' => request('search')]);
        }

        return view('dashboard.kelas.index', [
            "title" => "dashboard",
            'kelas' => $kelas->latest()->get()
        ]);
        

    }

    public function show($student) {
        
        return view('dashboard.student.detail', [
            "title" => "Student Details",
            "student" => Student::find($student)
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
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
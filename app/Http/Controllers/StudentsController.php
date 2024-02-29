<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(Request $request) {
        $students = Student::paginate(5);

        if ($request->has('search')) {
            $search = $request->input('search');
            $students = Student::where('nis', 'LIKE', "%$search%")
                ->orWhere('nama', 'LIKE', "%$search%")
                ->orWhere('tanggal_lahir', 'LIKE', "%$search%")
                ->orWhere('alamat', 'LIKE', "%$search%")
                ->paginate(5)
                ->appends(['search' => $search]); 
        }

        return view('student.all', [
            "title" => "Students",
            'students' => $students
        ]);
    }

    public function show($id) {
        $student = Student::findOrFail($id);

        // Tampilkan detail siswa
        return view('student.detail', [
            "title" => "Student Details",
            "student" => $student
        ]);
    }

    public function create() {
        // Tampilkan halaman tambah siswa
        return view('student.create', [
            "title" => "Add New Student",
            "kelas" => Kelas::all()
        ]);
    }

    public function store(Request $request) {
        // Validasi data siswa
        $validateData = $request->validate([
            "nis" => "required",
            "nama" => "required",
            "tanggal_lahir" => "required|date",
            "kelas_id" => "required",
            "alamat" => "required"
        ]);

        // Simpan data siswa baru
        $result = Student::create($validateData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect('/dashboard/student')->with('success', 'New student data has been added!');
    }

    public function destroy($id) {
        // Hapus siswa berdasarkan ID
        $result = Student::destroy($id);

        // Redirect kembali ke halaman index dengan pesan sukses atau error
        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Student data has been deleted!');
        } else {
            return redirect('/dashboard/student')->with('error', 'Student data failed to delete!');
        }
    }

    public function edit($id) {
        // Temukan siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Tampilkan halaman edit siswa
        return view('student.edit', [
            "title" => "Edit Student Data",
            "student" => $student,
            "kelas" => Kelas::all()
        ]);
    }

    public function update(Request $request, $id) {
        // Validasi data siswa yang akan diupdate
        $request->validate([
            "nis" => "required",
            "nama" => "required",
            "tanggal_lahir" => "required|date",
            "kelas_id" => "required",
            "alamat" => "required"
        ]);

        // Temukan siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Update data siswa
        $student->update([
            "nis" => $request->nis,
            "nama" => $request->nama,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelas_id" => $request->kelas_id,
            "alamat" => $request->alamat
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect('/dashboard/student')->with('success', 'Student data has been updated!');
    }
}

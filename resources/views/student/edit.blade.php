@extends('layouts.main')

@section('content')
    <a href="/dashboard/student" type="button" class="btn btn-primary">
        <i class="bi bi-box-arrow-left"></i>
        Back
    </a>
    <h3 style="text-align: center;">Edit Student</h3>

    @if(session('success'))
        <div class="alert alert-success">
                {{ session('success') }}
        </div>
    @endif
    
    <form action="/student/update/{{$student->id}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" value="{{$student->nis}}" id="nis" name="nis" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{$student->nama}}" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" value="{{$student->tanggal_lahir}}" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" name="kelas_id" id="">
                @if(isset($kelas))
                    @foreach ($kelas as $kelas)
                        <option value="{{ $kelas->id }}" {{ $kelas->id == $student->kelas_id ? 'selected' : '' }}>
                            {{ $kelas->kelas }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" value="{{$student->alamat}}" name="alamat" required>
        </div>

        <button type="submit"  class="btn btn-danger">Update</button>
    </form>
@endsection
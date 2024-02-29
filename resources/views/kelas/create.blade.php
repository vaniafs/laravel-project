@extends('layouts.main')

@section('content')
<div class="container">
    <a href="/dashboard/student" type="button" class="btn btn-primary mb-3">
        <i class="bi bi-box-arrow-left"></i>
        Back
    </a>
    <h1 style="text-align: center;">Add New Kelas Data</h1>

    <form method="post" action="/kelas/add">   
        @csrf
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" required value="{{ old('kelas') }}">
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
</div>
@endsection
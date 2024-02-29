@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Kelas</h1>
</div>

<div class="row">
  <div class="col-md-6" >
    <form action="/dashboard/kelas">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" aria-label="Search" value="{{request('search')}}">
        <button class="btn btn-primary" type="submit" id="button-addon2" >Search</button>
      </div>
    </form>
  </div>
</div>

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-warning sol-lg-12" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div>
  <a href="/kelas/create"  type="button" class="btn btn-primary mb-10" >Create New</a>
</div>
<br/>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $kelas)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$kelas->kelas}}</td>
                <td>
                    <a href="/kelas/edit/{{ $kelas->id }}" type="button" class="btn btn-outline-warning">Edit</a>
                    <form id="delete-form-{{ $kelas-> id }}" 
                    action="{{ url('/kelas/destroy', ['kelas' => $kelas->id]) }}" method="post" 
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger" 
                        onclick="return confirm('Are you sure you want to delete the data?')">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
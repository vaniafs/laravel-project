@extends('layouts.main')

@section('content')
<table class="table">

<div class="row">
  <div class="col-md-6" style="margin: auto;">
    <form action="/student/all" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" aria-label="Search" value="{{request('search')}}">
        <button class="btn btn-primary" type="submit" id="button-addon2" >Search</button>
      </div>
    </form>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">NIS</th>
        <th scope="col">Name</th>
        <th scope="col">Kelas</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @php
          $no = ($students->currentPage() - 1) * $students->perPage() + 1;
          @endphp
            @foreach($students as $student)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$student["nis"]}}</td>
        <td>{{$student["nama"]}}</td>
        <td>{{$student->kelas->kelas}}</td>
        <td>
            <a href="/student/detail/{{$student->id}}" type="button" class="btn btn-outline-info">Detail</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center">
  {{ $students->links()}}
</div>

@endsection
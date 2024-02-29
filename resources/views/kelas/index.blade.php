@extends('layouts.main')

@section('content')
<table class="table">

<table class="table">
  <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Kelas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kelas as $kelas)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$kelas["kelas"]}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
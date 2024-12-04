@extends('layouts.app')
@section('content')
<table class="table table-striped">
    <thead>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Symbol</th>
        <th>Action</th>
    </thead>
    @foreach ($data as $row)
    <tbody>
        <td>{{ $row->name }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->password }}</td>
        <td>{{ $row->role }}</td>
        <td>
            <style>
                .warna-kotak {
                    width: 50px;
                    height: 10px;
                    border-radius: 10%
                }
                .warna-kotak + .label {
                    margin-top: 5px;
                    text-align: center;
                }
            </style>
            <div class="col-4 text-center">
                @if($row->role == 'superadmin')
                <div class="warna-kotak" style="background-color: red;"></div>
                <div class="label"></div>
                @elseif($row->role == 'admin')
                <div class="warna-kotak" style="background-color: blue;"></div>
                <div class="label"></div>
                @elseif ($row->role == 'client')
                <div class="warna-kotak" style="background-color: green;"></div>
                <div class="label"></div>
                @endif
            </div>
        </td>
        <td>
            <a href="" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('user.destroy', $row->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
    </tbody>
    @endforeach
</table>
@endsection

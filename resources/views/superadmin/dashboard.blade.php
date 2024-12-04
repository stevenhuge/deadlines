@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <!-- Kotak pertama -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    @php
                        $roleId = Auth::user()->role = 'client';
                        $count = \App\Models\User::where('role', $roleId)->count();
                    @endphp
                    <h5 class="card-title">User Client</h5>
                    <p class="card-text">{{ $count }}</p>
                </div>
            </div>
        </div>

        <!-- Kotak kedua -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    @php
                        $roleId = Auth::user()->role = 'admin';
                        $count = \App\Models\User::where('role', $roleId)->count();
                    @endphp
                    <h5 class="card-title">Admin</h5>
                    <p class="card-text">{{ $count }}</p>
                </div>
            </div>
        </div>

        <!-- Kotak ketiga -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    @php
                        $roleId = Auth::user()->role = 'superadmin';
                        $count = \App\Models\User::where('role', $roleId)->count();
                    @endphp
                    <h5 class="card-title">Superadmin</h5>
                    <p class="card-text">{{ $count }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

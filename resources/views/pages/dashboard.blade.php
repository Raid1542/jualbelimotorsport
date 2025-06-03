@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Welcome to Your Dashboard</h1>
    <p>Hello, {{ auth()->user()->name }}! You are logged in.</p>

    <!-- Contoh konten dashboard -->
    <div class="mt-6 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Dashboard Content</h2>
        <p>Here you can manage your account and settings.</p>
    </div>
</div>
@endsection

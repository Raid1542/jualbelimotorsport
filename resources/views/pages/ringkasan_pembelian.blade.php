@extends('layouts.ringkasan_pembeli_layout')

@section('title', 'Ringkasan Pembelian')

@section('content')
    @include('components.header_ringkasan_pembayaran')

    <main class="py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg p-6 shadow-lg">

            @include('components.ringkasan_produk')
            <hr class="my-4 border-gray-700">

            @include('components.detail_pembayaran')
            <hr class="my-4 border-gray-700">

            @include('components.form_pembayaran')
        </div>
    </main>
@endsection

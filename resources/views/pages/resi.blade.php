@extends('layouts.layout_resi')

@section('title', 'Resi')

@section('content')
  @include('components.card_resi', ['data' => $data])
@endsection

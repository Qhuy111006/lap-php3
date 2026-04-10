@extends('layouts.lab5')

@section('title', 'Cập nhật tin')

@section('content')
    <div class="col-lg-8 mx-auto">
        @include('Tin._form', [
            'action' => route('tin.update', $tin->idTin),
            'buttonLabel' => 'Cập nhật tin',
        ])
    </div>
@endsection

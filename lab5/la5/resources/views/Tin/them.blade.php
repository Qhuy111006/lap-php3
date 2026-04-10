@extends('layouts.lab5')

@section('title', 'Thêm tin')

@section('content')
    <div class="col-lg-8 mx-auto">
        @include('Tin._form', [
            'action' => route('tin.store'),
            'buttonLabel' => 'Thêm tin',
        ])
    </div>
@endsection

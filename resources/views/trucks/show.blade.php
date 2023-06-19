@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $truck->unit_number }}</h3>
            <h5 class="card-title">{{ $truck->year}}</h5>
            <h5 class="card-title">{{ $truck->notes}}</h5>
        </div>
        <a href="{{ route('subunits.create', ['id' => $truck->id]) }}" class="btn btn-info">Replace with a subunit</a>
    </div>
@endsection
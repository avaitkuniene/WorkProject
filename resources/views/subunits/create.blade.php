@extends('layouts.layout')

@section('content')

<form action="{{ url('subunits/create') }}" method="post" class="row g-3">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf
    <div class="col-12">
        <div class="form-group">
            <label class="form-label">Main truck - {{ $truck->unit_number}}</label>
            <input  type="text" name="main_truck" class="form-control" value=" {{ $truck->id}} ">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label">Subunit:</label>
            <select name="subunit" class="form-control" multiple>
                @foreach($trucks as $truck)
                    <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label">Start date:</label>
            <input type="date" id="start_date" name="start_date">
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label class="form-label">End date:</label>
            <input type="date" id="end_date" name="end_date">
        </div>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-info">Save</button>
    </div>
</form>
@endsection
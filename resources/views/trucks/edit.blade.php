@extends('layouts.layout')

@section('content')

<h1>Truck {{ $truck->unit_number }} edit form</h1>

<form action="{{ route('trucks.edit', ['id' => $truck->id]) }}" method="post" class="row g-3">

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
            <label class="form-label">Truck unit number:</label>
            <input type="text" name="unit_number" value="{{ old('unit_number', $truck->unit_number) }}" class="form-control @error('unit_number') is-invalid @enderror">
        </div>

        <div class="col-12">
            <label class="form-label">Year:</label>
            <input type="text" name="year" value="{{ old('year', $truck->year) }}" class="form-control @error('year') is-invalid @enderror">
        </div>

        <div class="col-12">
            <label class="form-label">Notes:</label>
            <textarea type="text" name="notes" value="{{ old('notes', $truck->notes) }}" class="form-control
            @error('notes') is-invalid @enderror"></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
</form>
@endsection

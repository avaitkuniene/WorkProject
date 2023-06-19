@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col">
            <a href="{{ url('trucks/create') }}" class="btn btn-primary">Add new truck</a>
        </div>
    </div>

    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Unit number</th>
            <th scope="col">Year</th>
            <th scope="col">Notes</th>
            <th scope="col" width="100">Edit</th>
            <th scope="col" width="100">Delete</th>
            <th scope="col"></th>
        </tr>
    @foreach($trucks as $truck)
        <tr>
            <th scope="row">{{ $truck->id }}</th>
            <td>
                <a href="{{ url('trucks', ['id' => $truck->id]) }}">{{ $truck->unit_number }}</a>
            </td>
            <td>{{ $truck->year }}</td>
            <td>{{ $truck->notes }}</td>
            <td>
                <a href="{{ route('trucks.edit', ['id' => $truck->id]) }}" class="btn btn-info">Edit</a>
            </td>
            <td>
                <form action="{{ route('trucks.delete', ['id' => $truck->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <td>
            <a href="{{ route('subunits.create', ['id' => $truck->id]) }}" class="btn btn-info">Replace with a subunit</a>
            </td>
        </tr>
    @endforeach
    </table>
@endsection


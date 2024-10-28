@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Results</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Sport</th>
                    <th>1st Place</th>
                    <th>2nd Place</th>
                    <th>3rd Place</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->sport->name }}</td>
                        <td>{{ $result->first_place }}</td>
                        <td>{{ $result->second_place }}</td>
                        <td>{{ $result->third_place }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

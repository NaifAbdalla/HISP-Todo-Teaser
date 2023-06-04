@extends('layouts/app')

@section('content')
    <h1>TODO</h1>
    <ul>
            <li>Title: {{ $data['title'] }}</li>
            <li>Description: {{ $data['description'] }}</li>
            <li>Status: {{ $data['completed']?"Completed":"Pending" }}</li>
            <li>Created at: {{ $data['created'] }}</li>
            <li>Last Updated at: {{ $data['lastUpdated'] }}</li>
    </ul>

@endsection

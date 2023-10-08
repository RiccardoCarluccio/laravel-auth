@extends('layouts.app')
@section('title', 'Index')
@section('content')

  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Url</th>
        <th>Description</th>
      </tr>
    </thead>

    <tbody>
      @foreach($projects as $project)
        <tr>
          <td>{{ $project->title }}</td>
          <td>{{ $project->url }}</td>
          <td>{{ $project->description }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection

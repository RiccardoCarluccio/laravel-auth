@extends('layouts.app')
@section('title', 'Show')
@section('content')

  <h1>Project list</h1>

  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Url</th>
        <th>Description</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>{{ $project->title }}</td>
        <td>{{ $project->url }}</td>
        <td>{{ $project->description }}</td>
      </tr>
    </tbody>
  </table>

  <a href="{{ route('admin.projects.index') }}">Show all projects</a>

@endsection
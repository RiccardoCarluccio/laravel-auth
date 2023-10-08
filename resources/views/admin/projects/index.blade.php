@extends('layouts.app')
@section('title', 'Index')
@section('content')

  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Url</th>
        <th>Publication Date</th>
        <th>Description</th>
        <th>Slug</th>
      </tr>
    </thead>

    <tbody>
      @foreach($projects as $project)
        <tr>
          <td>{{ $project->title }}</td>
          <td>{{ $project->url }}</td>
          <td>{{ $project->publication_date }}</td>
          <td>{{ $project->description }}</td>
          <td>{{ $project->slug }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection

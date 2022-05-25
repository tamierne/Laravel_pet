@extends('layouts.layout')

@section('content')
<div>
    <ul>
      @foreach ($photos as $photo)
          <li>
            {{ $photo('main') }}
          </li>
      @endforeach
    <li></li>
    </ul>
</div>
@endsection
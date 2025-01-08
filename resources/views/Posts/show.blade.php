@extends('layouts.frontend')
@section('content')

<div class="card text-center mt-5 mb-5">
  <div class="card-header">
    #{{$Post->id }}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$Post->title }}</h5>
    <p class="card-text">{{$Post->description }}</p>
   
  </div>
  <div class="card-footer text-muted">
  {{date('y-m-d', strtotime($Post->created_at))}}
  </div>
</div>

@endsection
@extends('layouts.app')
@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
         
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <form action="{{route('police-search')}}" method="Post">
          @csrf
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" class="form-control form-control-lg" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Who are you looking for..........">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header> 
  @endsection()
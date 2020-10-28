@extends('layouts.app')
@section('content')

<!-- Masthead
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">         
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto mt-5">
          <form action="{{route('court-search')}}" method="get">
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
  </header>  -->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 pt-5">
            <div class="card">
               
                <div class="card-header" style="background-color: #A1E84F;"><h2 class="text-center"></h2></div>

                <div class="card-body">                              
                </div>
 
                <div class="card-body">
                <div class="col-md-12">
                    <h2>Search Result <b class="float-right"><a href="{{url('/')}}" class="btn btn-primary">Continue searching</a></b></h2>
                    <p>{{$records->count()}} result(s) for {{ request()->input('query') }}</p>
                         
                                     
                                     <table class="table table-condensed">
                                     
                                 <thead>
                                    
                                 <tr style="background-color: #33E899;">
                                  <th><b>Name</b></th>
                                  <th><b>Police Formation</b></th>
                                  <th><b>Offence Commited</b></th>
                                 <th> <b>Date Arrested</b></th>
                                  
                                 </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($records as $record)
                                     <tr>
                                         <td>{{$record->suspect_name}}</td> 
                                         <td>{{$record->police_formation}}</td>
                                         <td>{{$record->nature_of_offence}}</td>
                                         <td> <i><b>{{ \Carbon\Carbon::parse($record->date_of_arrest)->format('d/m/Y')}}</b></i></td>                                           
                                            
                                     </tr>
                                     @endforeach
                                 </tbody>
                                 
                                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
 
  @endsection()
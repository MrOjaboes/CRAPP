@extends('layouts.app')
@section('content')
 
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
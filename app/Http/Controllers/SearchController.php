<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\CourtRecord;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    
   
 public function court_search(){
    $data = request()->validate([
        'query' => 'required|min:3',
    ]);    
    $query = $data['query'];
     
   
   $records = DB::table('court_records')
   ->where('defendant_name', 'like', "%$query%")->orderBy('created_at','desc')
   ->get();
         return view('court_search_result',compact('records'));
}


  
public function police_search(){
    $data = request()->validate([
        'query' => 'required|min:3',
    ]);    
    $query = $data['query'];
     
   
   $records = DB::table('police_records')
   ->where('suspect_name', 'like', "%$query%")->orderBy('created_at','desc')
   ->get();
         return view('police_search_result',compact('records'));
}

  
public function prison_search(){
    $data = request()->validate([
        'query' => 'required|min:3',
    ]);    
    $query = $data['query'];
     
   
   $records = DB::table('prison_records')
   ->where('accused_name', 'like', "%$query%")->orderBy('created_at','desc')
   ->get();
         return view('prison_search_result',compact('records'));
}

}

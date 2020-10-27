<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\CourtRecord;
use Illuminate\Support\Facades\DB;
class CourtRecordController extends Controller
{
    
   
 public function search(){
    $data = request()->validate([
        'query' => 'required|min:3',
    ]);    
    $query = $data['query'];
     
   
   $records = DB::table('court_records')
   ->where('defendant_name', 'like', "%$query%")->orderBy('created_at','desc')
   ->get();
         return view('court_search_result',compact('records'));
}

    public function Index()
    {
        $courtrecords = CourtRecord::all();
        return view('court-records.index',compact('courtrecords'));
    }

    public function Create()
    {
    return view('court-records.create');
    }

    public function Store(Request $request){
       
        $request->validate([
             
            'defendant_name' => 'required',
            'charge_number' => 'required',
            'offence_nature' => 'required',
            'court_name' => 'required',
            'gender' => 'required',
            'court_charge' => 'required',
            'arraignment_date' => 'required',
            'final_charge' => 'required',    
        ]);
        auth()->user()->courtRecords()->create([
            
            'defendant_name' => $request['defendant_name'],
            'charge_number' => $request['charge_number'],
            'offence_nature' => $request['offence_nature'],
            'gender' => $request['gender'],
            'court_name' => $request['court_name'],
            'court_charge' => $request['court_charge'],
            'arraignment_date' => $request['arraignment_date'],
            'final_charge' => $request['final_charge'],    
            'user_id'=>auth()->user()->id,         
       ]);      
           
           
           return redirect()->back()->with('success','Records Submited Successfully!');
        
       
      
          }

          public function Show(\App\CourtRecord $court_record){
            
             return view('court-records.details',compact('court_record'));
        }

        public function Edit(\App\CourtRecord $court_record){
             
             return view('court-records.edit',compact('court_record'));
        }

        public function Update(Request $request, CourtRecord $court_record){
            // dd($request->all());
            if($court_record->update([
             'defendant_name' => $request->defendant_name,
             'charge_number' => $request->charge_number,
             'offence_nature' =>$request->offence_nature,
             'court_name' => $request->court_name,
             'court_charge' => $request->court_charge,
             'gender' => $request->gender,
             'arraignment_date' => $request->arraignment_date,
             'final_charge' => $request->final_charge
         ])){
            return redirect()->back()->with('success', 'Record Updated Successfully!');
         }               
          
            
         }

         public function destroy(Request $request, CourtRecord $court_record)
         {
             $court_record->delete();
     
             return redirect()->back()->with('warning', 'Record Deleted!');
         }
}

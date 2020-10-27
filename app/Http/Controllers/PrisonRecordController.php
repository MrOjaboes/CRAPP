<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PrisonRecord;
class PrisonRecordController extends Controller
{
    
    public function Index()
    {
        $prisonrecords = PrisonRecord::all();
        return view('prison-records.index',compact('prisonrecords'));
    }

    public function Create()
    {
    return view('prison-records.create');
    }

    public function Store(Request $request){
       
        $request->validate([             
        'accused_name' => 'required',
        'charge_number' => 'required',
        'arraignment_date' => 'required',
        'offence_nature' => 'required',
        'court_name' => 'required',
        'prison_charge' => 'required',
        'conviction_period' => '',
        ]);
        auth()->user()->prisonRecords()->create([
            
            'accused_name' => $request['accused_name'],
            'charge_number' => $request['charge_number'],
            'arraignment_date' => $request['arraignment_date'],
            'offence_nature' => $request['offence_nature'],
            'court_name' => $request['court_name'],
            'prison_charge' => $request['prison_charge'],
            'conviction_period' => $request['conviction_period'],
            'user_id'=>auth()->user()->id,         
       ]);      
           
           
           return redirect()->back()->with('success','Records Submited Successfully!');
        
       
      
          }

          public function Show(\App\PrisonRecord $prison_record){
             
             return view('prison-records.details',compact('prison_record'));
        }

        public function Edit(\App\PrisonRecord $prison_record){
            
             return view('prison-records.edit',compact('prison_record'));
        }

        public function Update(Request $request, PrisonRecord $prison_record){
            //dd($request->all());
            if($prison_record->update([
                'accused_name' => $request->accused_name,
                'charge_number' => $request->charge_number,
                'arraignment_date' =>$request->arraignment_date,
                'offence_nature' => $request->offence_nature,
                'court_name' => $request->court_name,
                'prison_charge' => $request->prison_charge,
                'conviction_period' => $request->conviction_period
            ])){
               return redirect()->back()->with('success', 'Record Updated Successfully!');
            }               
             
               
            }
   
            public function destroy(Request $request, PrisonRecord $prison_record)
            {
                $prison_record->delete();
        
                return redirect()->back()->with('warning', 'Record Deleted!');
            }
}

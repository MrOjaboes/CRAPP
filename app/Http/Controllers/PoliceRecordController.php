<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PoliceRecord;
class PoliceRecordController extends Controller
{
    public function Index()
    {
        $policerecords = PoliceRecord::all();
        return view('police-records.index',compact('policerecords'));
    }

    public function Create()
    {
    return view('police-records.create');
    }

    public function Store(Request $request){
       
        $request->validate([
             
            'suspect_name' => 'required',
            'file_number' => 'required',
            'police_formation' => 'required',
            'date_of_arrest' => 'required',
            'nature_of_offence' => 'required',
            'admin_suspect' => 'required',
            'remarks' => 'required',
        ]);
        auth()->user()->policeRecords()->create([
            
            'suspect_name' => $request['suspect_name'],
            'file_number' => $request['file_number'],
            'police_formation' => $request['police_formation'],
            'date_of_arrest' => $request['date_of_arrest'],
            'nature_of_offence' => $request['nature_of_offence'],
            'admin_suspect' => $request['admin_suspect'],
            'remarks' => $request['remarks'],     
            'user_id'=>auth()->user()->id,         
       ]);      
           
           
           return redirect()->back()->with('success','Records Submited Successfully!');
        
       
      
          }

          public function Show(\App\PoliceRecord $police_record){
            
             return view('police-records.details',compact('police_record'));
        }

        public function Edit(\App\PoliceRecord $police_record){
             
             return view('police-records.edit',compact('police_record'));
        }

        public function Update(Request $request, PoliceRecord $police_record){
            // dd($request->all());
            if($police_record->update([
             'suspect_name' => $request->suspect_name,
             'file_number' => $request->file_number,
             'police_formation' =>$request->police_formation,
             'date_of_arrest' => $request->date_of_arrest,
             'nature_of_offence' => $request->nature_of_offence,
             'admin_suspect' => $request->admin_suspect,
             'remarks' => $request->remarks
         ])){
            return redirect()->back()->with('success', 'Record Updated Successfully!');
         }               
          
            
         }

         public function destroy(Request $request, PoliceRecord $police_record)
         {
             $police_record->delete();
     
             return redirect()->back()->with('warning', 'Record Deleted!');
         }
}

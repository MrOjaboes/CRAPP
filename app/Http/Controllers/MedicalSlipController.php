<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MedicalSlip;
class MedicalSlipController extends Controller
{
    public function Create()
    {
    return view('medical.create');
    }

    public function Store(Request $request){
       
        $request->validate([
            'station_code' => 'required',
            'station_address' => 'required',
            'victim_name' => 'required',
            'victim_address' => 'required',
            'case_type' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'hospital_bill' => 'required',
            'issued_date' => 'required',     
        ]);
        auth()->user()->medicalSlips()->create([     
            'station_code' => $request['station_code'],
            'station_address' => $request['station_address'],
            'victim_name' => $request['victim_name'],
            'victim_address' => $request['victim_address'],
            'case_type' => $request['case_type'],
            'gender' => $request['gender'],
            'nationality' => $request['nationality'],
            'hospital_name' => $request['hospital_name'],
            'hospital_address' => $request['hospital_address'],
            'hospital_bill' => $request['hospital_bill'],
            'issued_date' => $request['issued_date'],
            'user_id'=>auth()->user()->id,         
       ]);      
           
           
           return redirect()->back()->with('success','Medical Slip Submited Successfully!');
        
       
      
          }
 
        

          public function Show(\App\MedicalSlip $medical_slip){
             
             return view('medical.details',compact('medical_slip'));
        }

        public function Edit(\App\MedicalSlip $medical_slip){
            
             return view('medical.edit',compact('medical_slip'));
        }

        public function Update(Request $request, MedicalSlip $medical_slip){
            //dd($request->all());
            if($medical_slip->update([
                'station_code' => $request->station_code,
                'station_address' => $request->station_address,
                'victim_name' =>$request->victim_name,
                'victim_address' => $request->victim_address,
                'case_type' => $request->case_type,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'hospital_name' => $request->hospital_name,
                'hospital_address' => $request->hospital_address,
                'hospital_bill' => $request->hospital_bill,
                'issued_date' => $request->issued_date
            ])){
               return redirect()->back()->with('success', 'Record Updated Successfully!');
            }               
             
               
            }
   
            public function destroy(Request $request, MedicalSlip $medical_slip)
            {
                $medical_slip->delete();
        
                return redirect()->back()->with('warning', 'Record Deleted!');
            }
}

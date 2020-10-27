<?php

namespace App\Http\Controllers;
use App\PoliceInvitation;
use Illuminate\Http\Request;

class PoliceInvitationController extends Controller
{
    public function Index()
    {
        $invitations = PoliceInvitation::all();
        return view('police-invitations.index',compact('invitations'));
    }

    public function Create()
    {
    return view('police-invitations.create');
    }

    public function Store(Request $request){
       
        $request->validate([
            'officer_name' => 'required',
            'rank' => 'required',
            'invitee_name' => 'required',
            'gender' => 'required',
            'reason' => 'required',
            'invitation_date' => 'required',
            'police_district' => 'required',
            'station_code' => 'required',
            'invitee_address' => 'required',
            'response_date' => 'required',        
                 
        ]);
        auth()->user()->policeInvitations()->create([
           

            'officer_name' =>  $request['officer_name'],
            'rank' =>  $request['rank'],
            'invitee_name' =>  $request['invitee_name'],
            'gender' =>  $request['gender'],
            'reason' =>  $request['reason'],
            'invitation_date' =>  $request['invitation_date'],
            'police_district' =>  $request['police_district'],
            'station_code' =>  $request['station_code'],
            'invitee_address' =>  $request['invitee_address'],
            'response_date' =>   $request['response_date'],            
            'user_id'=>auth()->user()->id,         
       ]);      
           
           
           return redirect()->back()->with('success','Invitation Submited Successfully!');
        
       
      
          }

          public function Show(\App\PoliceInvitation $invitation){
            //$invitation = PoliceInvitation::t','desc')->get();
           
             return view('police-invitations.details',compact('invitation'));
        }

        public function Edit(\App\PoliceInvitation $invitation){
            //$invitation = PoliceInvitation::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
           
             return view('police-invitations.edit',compact('invitation'));
        }

        public function Update(Request $request, PoliceInvitation $invitation){
            //dd($request->all());
            if($invitation->update([
             'officer_name' => $request->officer_name,
             'rank' =>$request->rank,
             'invitee_name' => $request->invitee_name,
             'gender' => $request->gender,
             'reason' => $request->reason,
             'invitation_date' => $request->invitation_date,
             'police_district' => $request->police_district,
             'station_code' => $request->station_code,
             'invitee_address' => $request->invitee_address,
             'response_date' => $request->response_date
             
         ])){
            return redirect()->back()->with('success', 'Invitation Updated Successfully!');
         }      
          
            
         }

         public function destroy(Request $request, PoliceInvitation $invitation)
    {
        $invitation->delete();

        return redirect()->back()->with('warning', 'Invitation Deleted!');
    }
}

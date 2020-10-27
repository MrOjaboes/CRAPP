<?php

namespace App\Http\Controllers;

use App\Saving;
use App\MedicalSlip;
use App\PoliceInvitation;
use App\PoliceRecord;
use App\PrisonRecord;
use App\CourtRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $medical_slips = MedicalSlip::all();
        return view('home', compact('medical_slips'));
    }


    public function police_record()
    {
        $policerecords = PoliceRecord::all();
        return view('police_records', compact('policerecords'));
    }

    public function police_invitation()
    {
        $invitations = PoliceInvitation::all();
        return view('invitations', compact('invitations'));
    }

    public function prison_record()
    {
        $prisonrecords = PrisonRecord::all();
        return view('prisons_records', compact('prisonrecords'));
    }

    public function court_record()
    {
        $courtrecords = CourtRecord::all();
        return view('court_records', compact('courtrecords'));
    }

    //details Block

    public function court_record_details(\App\CourtRecord $court_record)
    {
         
        return view('court_record_details', compact('court_record'));
    }

    public function police_record_details(\App\PoliceRecord $police_record)
    {
         
        return view('police_records_details', compact('police_record'));
    }

    public function prison_record_details(\App\PrisonRecord $prison_record)
    {
         
        return view('prison_records_details', compact('prison_record'));
    }

    public function medical_record_details(\App\MedicalSlip $medical_slip)
    {
         
        return view('medical_details', compact('medical_slip'));
    }
    public function police_invitation_details(\App\PoliceInvitation $invitation)
    {
         
        return view('invitation_details', compact('invitation'));
    }
    
}


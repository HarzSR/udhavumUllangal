<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Donor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Validator;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        //
    }

    // Add Donor Function

    public function addDonor(Request $request)
    {
        Session::put('page', 'add-donor');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            // V0.1 Validator

            $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^[a-zA-Z ]*$/|max:255',
                    'number' => 'required|regex:/^[0-9 \+]+$/|min:6',
                    'gender' => 'required|regex:/^[a-zA-Z]*$/',
                    'dob' => 'sometimes|date_format:d/m/Y',
                    'email' => 'sometimes|email:rfc,dns',
                    'address' => 'sometimes|regex:/^[a-zA-Z0-9 \.\-\/\,\&]*$/|min:10',
                    'trustee' => 'required|regex:/^[a-zA-Z\-]*$/',
                    'notes' => 'nullable|regex:/^[a-zA-Z0-9 \.\-\/\,]*$/',
                    'status' => 'sometimes|regex:/^[a-zA-Z]*$/',
                ],
                [
                    'name.required' => 'The name field is required',
                    'name.regex' => 'The name format is invalid',
                    'name.max' => 'The name is too long',
                    'number.required' => 'The number field is required',
                    'number.regex' => 'The number format is invalid',
                    'number.min' => 'The number is too short',
                    'gender.required' => 'The gender field is required',
                    'gender.regex' => 'The gender format is invalid',
                    'dob.date_format' => 'The date format is invalid',
                    'address.regex' => 'The address format is invalid',
                    'address.min' => 'The address is too short',
                    'trustee.required' => 'The trustee field is required',
                    'trustee.regex' => 'The trustee format is invalid',
                    'notes.regex' => 'The notes format is invalid',
                    'status.regex' => 'The status format is invalid',
                ]
            );

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput($request->input());
            }

            $donor = new Donor();

            $donor->name = $data["name"];
            $donor->number = $data["number"];
            $donor->gender = $data["gender"];
            if(empty($data["dob"]))
            {
                $donor->dob = "";
            }
            else
            {
                $donor->dob = Carbon::createFromFormat('d/m/Y', $data["dob"])->format('Y-m-d');
            }
            if(empty($data["email"]))
            {
                $donor->email = "";
            }
            else
            {
                $donor->email = $data["email"];
            }
            if(empty($data["address"]))
            {
                $donor->address = "";
            }
            else
            {
                $donor->address = $data["address"];
            }
            $donor->reference = $data["trustee"];
            if(empty($data["notes"]))
            {
                $donor->notes = "";
            }
            else
            {
                $donor->notes = $data["notes"];
            }
            if(empty($data["status"]))
            {
                $donor->status = "0";
            }
            else
            {
                $donor->status = "1";
            }

            $donor->save();

            Session::flash('success_message', 'Donor Added Successfully');

            return redirect('/admin/add-donor');
        }

        return view('admin.donors.add_donor');
    }

    // Add Corporate Donor Function

    public function addCorporateDonor(Request $request)
    {
        Session::put('page', 'add-corporate-donor');

        return view('admin.donors.add_corporate_donor');
    }

    // View Donor Function

    public function viewDonor()
    {
        Session::put('page', 'view-donors');

        $donors = Donor::get();

        return view('admin.donors.view_donor')->with(compact('donors'));
    }

    // Update Donor Status Function

    public function updateDonorStatus(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();

            if($data['status'] == "active")
            {
                $status = 0;
            }
            else
            {
                $status = 1;
            }

            Donor::where('id', $data['donor_id'])->update(['status' => $status]);

            return response()->json(['status' => $status, 'donor_id' => $data['donor_id']]);
        }
    }
}

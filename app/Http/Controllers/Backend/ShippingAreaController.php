<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{

     // ========================= Division Manage ==================


    /**
     *  Division View
     */
    public function DivisionView(){

        $division = ShipDivision::orderBy('id', 'DESC') -> get();
        return view('backend.ship.division.view_division', compact('division'));
    }

    /**
     *  Division Insert
     */
    public function DivisionStore(Request $request){

        $this -> validate($request, [
            'division_name'     => 'required'
        ], [
            'division_name.required'        => 'Division name is required'
        ]);

        ShipDivision::insert([
            'division_name'     => $request -> division_name
        ]);

        // confirmation message
        $notification = [
            'message'       => 'Division Created Successfully',
            'alert-type'    => 'primary'
        ];

        return redirect() -> back() -> with($notification);
    

    }


    /**
     *  Division Edit
     */
    public function DivisionEdit($id){

        $edit_data = ShipDivision::find($id);
        $division = ShipDivision::orderBy('id', 'DESC') -> get();
        return view('backend.ship.division.edit_division', compact('edit_data', 'division'));
    }

    /**
     *  Division Edit
     */
    public function DivisionUpdate(Request $request, $id){

        ShipDivision::find($id) -> update([
            'division_name'     => $request -> division_name
        ]);

        // confirmation message
        $notification = [
            'message'       => 'Division Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('manage-division') -> with($notification);


    }


    /**
     *  Division Delete
     */
    public function DivisionDelete($id){

        ShipDivision::find($id) -> delete();

        // confirmation message
        $notification = [
            'message'       => 'Division Deleted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('manage-division') -> with($notification);


    }


     // ========================= Drstrict Manage ==================

    /**
     *  Drstrict View
     */
    public function DistrictView(){

        $district = ShipDistrict::orderBy('id', 'ASC') -> get();
        $division = ShipDivision::orderBy('id', 'DESC') -> get();
        return view('backend.ship.district.view_district', compact('district', 'division'));

    }


    /**
     *  district Insert
     */
    public function DistrictStore(Request $request){

        $this -> validate($request, [
            'district_name'     => 'required'
        ], [
            'district_name.required'        => 'District name is required'
        ]);

        ShipDistrict::insert([
            'district_name'     => $request -> district_name,
            'division_id'       => $request -> division_id,
            'created_at'        => Carbon::now()
        ]);

        // confirmation message
        $notification = [
            'message'       => 'District Created Successfully',
            'alert-type'    => 'primary'
        ];

        return redirect() -> back() -> with($notification);
    

    }


    /**
     *  district Edit
     */
    public function DistrictEdit($id){

        $edit_data = ShipDistrict::find($id);
        $district = ShipDistrict::orderBy('id', 'DESC') -> get();
        $division = ShipDivision::orderBy('id', 'DESC') -> get();
        return view('backend.ship.district.edit_district', compact('edit_data', 'district', 'division'));
    }

    /**
     *  district Update
     */
    public function DistrictUpdate(Request $request, $id){

        ShipDistrict::find($id) -> update([
            'district_name'     => $request -> district_name,
            'division_id'       => $request -> division_id,
            'created_at'        => Carbon::now()
        ]);

        // confirmation message
        $notification = [
            'message'       => 'District Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('manage-district') -> with($notification);


    }


    /**
     *  district Delete
     */
    public function DistrictDelete($id){

        ShipDistrict::find($id) -> delete();

        // confirmation message
        $notification = [
            'message'       => 'District Deleted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('manage-district') -> with($notification);


    }




       // ========================= State Manage ==================

    /**
     *  Drstrict View
     */
    public function StateView(){

        $district = ShipDistrict::orderBy('id', 'ASC') -> get();
        $division = ShipDivision::orderBy('id', 'DESC') -> get();
        $state    = ShipState::orderBy('id', 'ASC') -> get();
        return view('backend.ship.state.view_state', compact('district', 'division', 'state'));

    }


    /**
     *  district Insert
     */
    public function StateStore(Request $request){

        $this -> validate($request, [
            'state_name'     => 'required'
        ], [
            'state_name.required'        => 'State name is required'
        ]);

        ShipState::insert([
            'state_name'        => $request -> state_name,
            'division_id'       => $request -> division_id,
            'district_id'       => $request -> district_id,
            'created_at'        => Carbon::now()
        ]);

        // confirmation message
        $notification = [
            'message'       => 'State Created Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> back() -> with($notification);
    

    }


    /**
     *  district Edit
     */
    public function StateEdit($id){

        $edit_data = ShipState::find($id);
        $district = ShipDistrict::orderBy('id', 'DESC') -> get();
        $division = ShipDivision::orderBy('id', 'DESC') -> get();
        $state    = ShipState::orderBy('id', 'ASC') -> get();
        return view('backend.ship.state.edit_state', compact('edit_data', 'district', 'division', 'state'));
    }

    /**
     *  district Update
     */
    public function StateUpdate(Request $request, $id){

        ShipState::find($id) -> update([
            'state_name'        => $request -> state_name,
            'division_id'       => $request -> division_id,
            'district_id'       => $request -> district_id,
            'created_at'        => Carbon::now()
        ]);

        // confirmation message
        $notification = [
            'message'       => 'State Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('manage-state') -> with($notification);


    }


    /**
     *  district Delete
     */
    public function StateDelete($id){

        ShipState::find($id) -> delete();

        // confirmation message
        $notification = [
            'message'       => 'State Deleted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('manage-state') -> with($notification);

    }



    /**
     *  Get District Based upon Division
     */
    public function GetDistrictByDivision($id){

        $get_district = ShipDistrict::where('division_id', $id) -> get();
        return $get_district;

    }



}

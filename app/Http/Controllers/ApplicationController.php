<?php

namespace App\Http\Controllers;

use App\BillPayment;
use App\Owner;
use App\Property;
use App\PropertyType;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postRegisterOwner(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name'    => 'required',
            'other_names'   =>  'required',
            'email'         =>  'required',
            'phone_number'  =>  'required|digits:10',
            'house_number'  =>  'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $owner = new Owner();
        $owner->first_name      =   $request->get('first_name');
        $owner->other_names     =   $request->get('other_names');
        $owner->email           =   $request->get('email');
        $owner->phone_number    =   $request->get('phone_number');
        $owner->house_number    =   $request->get('house_number');

        $owner->save();

        return redirect()->to('/listings/owners')->with('message', 'Owner has been successfully registered!');
    }
    public function getRegisterOwner(){
        return view('register_owner')
                    ->with('view_id','register_owner');
    }

    public function getRegisterProperty(){
        return view('register_property')
            ->with('view_id','register_property');
    }

    public function getOwnersListing(){
        return view('owners_listing')
            ->with('owners', Owner::all())
            ->with('view_id','owners_listing');
    }

    public function postRegisterProperty(Request $request){

        $validator = Validator::make($request->all(), [
            'name'                  =>  'required',
            'property_type_id'      =>  'required',
            'value'                 =>  'required',
            'location'              =>  'required',
            'owner_id'              =>  'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $property = new Property();
        $property->name = $request->get('name');
        $property->property_type_id = $request->get('property_type_id');
        $property->value = $request->get('value');
        $property->location = $request->get('location');
        $property->owner_id = $request->get('owner_id');
        $property->annual_rate = $property->value * 0.02;
        $property->save();

        return redirect()->back()->with('message', 'A new property of'
            .Owner::find($request->get('owner_id'))->full_name. ' has been added.');
    }

    public function deleteProperty($property_id){
        $prop = Property::find($property_id);
        $prop->delete();
        return redirect()->back()->with('message', 'The selected property was successfully deleted!');
    }
    public function deleteOwner($owner_id){
        $props = Property::where('owner_id', $owner_id)->get();
        if(count($props)>0){
            foreach ($props as $prop){
                $prop->delete();
            }
        }
        $owner = Owner::find($owner_id);
        $owner->delete();

        return redirect()->back()->with('message', 'Owner removal was successful!');
    }

    public function getOwnerProfile($owner_id){



        return view('owner_profile')
            ->with('owner', Owner::find($owner_id))
            ->with('properties', Property::where('owner_id', $owner_id)->get())
            ->with('property_types', PropertyType::all())
            ->with('view_id','owners_listing');
    }

    public function updateOwnerProfile($owner_id, Request $request){
        $validator = Validator::make($request->all(), [
            'first_name'    =>      'required',
            'other_names'   =>      'required',
            'email'         =>      'required',
            'phone_number'  =>      'required|digits:10',
            'house_number'  =>      'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $owner = Owner::find($owner_id);
        $owner->first_name      =   $request->get('first_name');
        $owner->other_names     =   $request->get('other_names');
        $owner->email           =   $request->get('email');
        $owner->phone_number    =   $request->get('phone_number');
        $owner->house_number    =   $request->get('house_number');

        $owner->save();

        return redirect()->to('/owner/'.$owner_id.'/profile')->with('message', 'Owner Details has been successfully updated!');
    }

    public function getPropertiesListing(){
        return view('auth.register')
            ->with('view_id','properties_listing');
    }

    public function makePayment($owner_id, $property_id, Request $request){
        $payment = new BillPayment();
        $payment->property_id = $property_id;
        $payment->clearance_for = $request->get('year');
        $payment->save();

        $property = Property::find($property_id);
        $property->updateState();

        $owner = Owner::find($property->owner_id);

        return redirect()->back()
            ->with('message','Bill payment for '.$payment->clearance_for .'  has been made successfully.');
    }

    public function ViewOwnerProperty($owner_id, $property_id){
        $property = Property::find($property_id);
        $property->updateState();

        return view('view_property')
            ->with('owner', Owner::find($owner_id))
            ->with('property', $property)
            ->with('property_types', PropertyType::all())
            ->with('transactions', BillPayment::where('property_id', $property_id)->get())
            ->with('view_id','owners_listing');
    }

}

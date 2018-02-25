<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Route;
use App\Models\Country;
use App\Models\LocationField;

class LocationsController extends Controller
{

    public $successStatus = 200;

    public function list() 
    {
        $data_response = Country::with("locations")->get();
        $data_error = array();

        return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);      
    }

    public function location(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make(Route::getCurrentRoute()->parameters(), [
            'country' => 'required|string|max:100',
            'location' => 'string|max:100',
        ]);

        if($validator->fails()) 
        {
            $data_error = $validator->errors();

            return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
        }

        if($request->route("location")) 
        {
            $country = $request->route("country");
            $location = $request->route("location");

            $data_response = Country::where("name", $country)
                                ->with(["locations" => function ($query) use($location) {
                                    $query->where("field", $location);
                                }])
                                ->get();
        } 
        else 
        {
            $country = $request->route("country");

            $data_response = Country::where("name", $country)
                                ->with("locations")
                                ->get();
        }

        return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
    }

    public function insertLocation(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make($request->all(), [
            'country_id' => 'required|integer|digits_between:1,3',
            'field' => 'required|string|max:100',
            'sort' => 'required|integer|digits_between:1,2',
        ]);

        if($validator->fails()) 
        {
            $data_error = $validator->errors();

            return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
        }

        $country_id = $request->input("country_id");
        $field = $request->input("field");
        $sort = $request->input("sort");

        $location = new LocationField;
        $location->countries_id = $country_id;
        $location->field = $field;
        $location->sort = $sort;

        if($location->save())
        {
            $data_response = "The location has been registered correctly.";
        } 
        else 
        {
            $data_error = "Has been occurred an error during register.";
        }

        return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
    }

    public function updateLocation(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make($request->all(), [
            'location_id' => 'required|integer|digits_between:1,3',
            'field' => 'required|string|max:100',
            'sort' => 'required|integer|digits_between:1,2',
        ]);

        if($validator->fails()) 
        {
            $data_error = $validator->errors();

            return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
        }

        $location_id = $request->input("location_id");
        $field = $request->input("field");
        $sort = $request->input("sort");

        $location = LocationField::find($location_id);
        $location->field = $field;
        $location->sort = $sort;

        if($location->save())
        {
            $data_response = "The location has been updated correctly.";
        } 
        else 
        {
            $data_error = "Has been occurred an error during update.";
        }

        return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
    }

    public function deleteLocation(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make($request->all(), [
            'location_id' => 'required|integer|digits_between:1,3',
        ]);

        if($validator->fails()) 
        {
            $data_error = $validator->errors();

            return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
        }

        $location_id = $request->input("location_id");

        $locations = LocationField::destroy($location_id);

        if($locations)
        {
            $data_response = "The location has been deleted correctly.";
        } 
        else 
        {
            $data_error = "Has been occurred an error during delete.";
        }

        return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Route;
use App\Models\Country;

class CountriesController extends Controller
{

    public $successStatus = 200;

    public function list() 
    {
        $data_response = Country::all();
        $data_error = array();

    	return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
    }

    public function country(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make(Route::getCurrentRoute()->parameters(), [
            'country' => 'required|string|max:100',
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

        $country = $request->route("country");

        $data_response = Country::where("name", $country)->get();

        return response()->json([
                'response' => $data_response, 
                'error' => $data_error
            ], 
            $this->successStatus);
    }

    public function insertCountry(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:countries',
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

        $name = $request->input("name");

        $countries = new Country;
        $countries->name = $name;

        if($countries->save())
        {
            $data_response = "The country has been registered correctly.";
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

    public function updateCountry(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|digits_between:1,3',
            'name' => 'required|string|max:100|unique:countries',
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

        $id = $request->input("id");
        $name = $request->input("name");

        $countries = Country::find($id);
        $countries->name = $name;

        if($countries->save())
        {
            $data_response = "The country has been updated correctly.";
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

    public function deleteCountry(Request $request) 
    {
        $data_response = array();
        $data_error = array();

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|digits_between:1,3',
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

        $id = $request->input("id");

        $countries = Country::destroy($id);

        if($countries)
        {
            $data_response = "The country has been deleted correctly.";
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

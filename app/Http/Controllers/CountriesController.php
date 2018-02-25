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

    /**
     * @api {get} /countries List
     * @apiName List
     * @apiGroup Country
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json      
     *
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.          
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "response": [
     *          {
     *              "id": 5,
     *              "name": "Venezuela",
     *              "created_at": "2018-02-25 07:22:21",
     *              "updated_at": "2018-02-25 07:43:16"          
     *          },
     *          {
     *              "id": 6,
     *              "name": "Argentina",
     *              "created_at": "2018-02-23 07:22:21",
     *              "updated_at": "2018-02-24 07:43:16"          
     *          }     
     *        ],
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {get} /countries/{country?} Detail
     * @apiName Detail
     * @apiGroup Country
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json
     *
     * @apiParam {String} country Country name.
     *
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.          
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "response": [
     *          {
     *              "id": 5,
     *              "name": "Venezuela",
     *              "created_at": "2018-02-25 07:22:21",
     *              "updated_at": "2018-02-25 07:43:16"          
     *          }
     *        ],
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {post} /countries Register
     * @apiName Register
     * @apiGroup Country
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json     
     *
     * @apiParam {String} name User name. 
     *
     * @apiSuccess {String} response  Response about register.
     * @apiSuccess {String} error  Error about register.     
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "response": "The country has been registered correctly.",
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {put} /countries Update
     * @apiName Update
     * @apiGroup Country
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json     
     *
     * @apiParam {Number} id Country ID.      
     * @apiParam {String} name Country name. 
     *
     * @apiSuccess {String} response  Response about update.
     * @apiSuccess {String} error  Error about update.     
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "response": "The country has been updated correctly.",
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {delete} /countries Delete
     * @apiName Delete
     * @apiGroup Country
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json     
     *
     * @apiParam {Number} id Country ID. 
     *
     * @apiSuccess {String} response  Response about delete.
     * @apiSuccess {String} error  Error about delete.     
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "response": "The country has been deleted correctly.",
     *        "error": []
     *     }
     *
     */
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

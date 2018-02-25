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

    /**
     * @api {get} /countries/locations/all List
     * @apiName List
     * @apiGroup Location
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json      
     *
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.  
     * @apiSuccess {Object[]} response.locations  List of options (Array of Objects).
     * @apiSuccess {Number} response.locations.id  The location ID.
     * @apiSuccess {Number} response.locations.countries_id  The country ID.     
     * @apiSuccess {String} response.locations.field  The location field name.
     * @apiSuccess {Number} response.locations.sort  Hierarchy of a location.     
     * @apiSuccess {Date} response.locations.created_at  Date registered.
     * @apiSuccess {Date} response.locations.updated_at  Date updated.       
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "response": [
     *          {
     *              "id": 5,
     *              "name": "Venezuela",
     *              "created_at": "2018-02-25 07:22:21",
     *              "updated_at": "2018-02-25 07:43:16",
     *              "locations": [
     *                  {
     *                      "id": 4,
     *                      "countries_id": 5,
     *                      "field": "Municipio",    
     *                      "sort": 2,     
     *                      "created_at": "2018-02-25 07:22:21",
     *                      "updated_at": "2018-02-25 07:43:16"     
     *                  },
     *                  {
     *                      "id": 5,
     *                      "countries_id": 5,
     *                      "field": "Estado",    
     *                      "sort": 1,     
     *                      "created_at": "2018-02-25 07:23:21",
     *                      "updated_at": "2018-02-25 07:43:16"     
     *                  },
     *                  {
     *                      "id": 6,
     *                      "countries_id": 5,
     *                      "field": "Ciudad",    
     *                      "sort": 3,     
     *                      "created_at": "2018-02-25 07:24:21",
     *                      "updated_at": "2018-02-25 07:43:16"     
     *                  }             
     *              ]               
     *          },
     *          {
     *              "id": 6,
     *              "name": "Argentina",
     *              "created_at": "2018-02-23 07:22:21",
     *              "updated_at": "2018-02-24 07:43:16",
     *              "locations": []          
     *          }     
     *        ],
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {get} /countries/{country}/locations/{location?} Detail
     * @apiName Detail
     * @apiGroup Location
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json      
     *
     * @apiParam {Number} country_id Country ID.
     * @apiParam {Number} location_id Location ID.     
     *     
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.  
     * @apiSuccess {Object[]} response.locations  List of options (Array of Objects).
     * @apiSuccess {Number} response.locations.id  The location ID.
     * @apiSuccess {Number} response.locations.countries_id  The country ID.     
     * @apiSuccess {String} response.locations.field  The location field name.
     * @apiSuccess {Number} response.locations.sort  Hierarchy of a location.     
     * @apiSuccess {Date} response.locations.created_at  Date registered.
     * @apiSuccess {Date} response.locations.updated_at  Date updated.       
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "response": [
     *          {
     *              "id": 5,
     *              "name": "Venezuela",
     *              "created_at": "2018-02-25 07:22:21",
     *              "updated_at": "2018-02-25 07:43:16",
     *              "locations": [
     *                  {
     *                      "id": 4,
     *                      "countries_id": 5,
     *                      "field": "Municipio",    
     *                      "sort": 2,     
     *                      "created_at": "2018-02-25 07:22:21",
     *                      "updated_at": "2018-02-25 07:43:16"     
     *                  }          
     *              ]               
     *          },
     *          {
     *              "id": 6,
     *              "name": "Argentina",
     *              "created_at": "2018-02-23 07:22:21",
     *              "updated_at": "2018-02-24 07:43:16",
     *              "locations": []          
     *          }     
     *        ],
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {post} /countries/locations Register
     * @apiName Register
     * @apiGroup Location
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json      
     *
     * @apiParam {Number} country_id Country ID.
     * @apiParam {String} field Location field name.
     * @apiParam {Number} sort Hierarchy of a location.
     *     
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.  
     * @apiSuccess {Object[]} response.locations  List of options (Array of Objects).
     * @apiSuccess {Number} response.locations.id  The location ID.
     * @apiSuccess {Number} response.locations.countries_id  The country ID.     
     * @apiSuccess {String} response.locations.field  The location field name.
     * @apiSuccess {Number} response.locations.sort  Hierarchy of a location.     
     * @apiSuccess {Date} response.locations.created_at  Date registered.
     * @apiSuccess {Date} response.locations.updated_at  Date updated.       
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "response": "The location has been registered correctly.",
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {put} /countries/locations Update
     * @apiName Update
     * @apiGroup Location
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json      
     *
     * @apiParam {Number} location_id Location ID.
     * @apiParam {String} field Location field name.
     * @apiParam {Number} sort Hierarchy of a location.
     *     
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.  
     * @apiSuccess {Object[]} response.locations  List of options (Array of Objects).
     * @apiSuccess {Number} response.locations.id  The location ID.
     * @apiSuccess {Number} response.locations.countries_id  The country ID.     
     * @apiSuccess {String} response.locations.field  The location field name.
     * @apiSuccess {Number} response.locations.sort  Hierarchy of a location.     
     * @apiSuccess {Date} response.locations.created_at  Date registered.
     * @apiSuccess {Date} response.locations.updated_at  Date updated.       
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "response": "The location has been updated correctly.",
     *        "error": []
     *     }
     *
     */
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

    /**
     * @api {delete} /countries/locations Delete
     * @apiName Delete
     * @apiGroup Location
     * @apiHeader {String} Authorization Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy
     * @apiHeader {String} Accept_Value application/json
     * @apiHeader {String} Content-Type application/json      
     *
     * @apiParam {Number} location_id Location ID.
     *     
     * @apiSuccess {Object[]} response List of options (Array of Objects).
     * @apiSuccess {Number} response.id  The country ID.
     * @apiSuccess {String} response.name  The country name.
     * @apiSuccess {Date} response.created_at  Date registered.
     * @apiSuccess {Date} response.updated_at  Date updated.  
     * @apiSuccess {Object[]} response.locations  List of options (Array of Objects).
     * @apiSuccess {Number} response.locations.id  The location ID.
     * @apiSuccess {Number} response.locations.countries_id  The country ID.     
     * @apiSuccess {String} response.locations.field  The location field name.
     * @apiSuccess {Number} response.locations.sort  Hierarchy of a location.     
     * @apiSuccess {Date} response.locations.created_at  Date registered.
     * @apiSuccess {Date} response.locations.updated_at  Date updated.       
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "response": "The location has been deleted correctly.",
     *        "error": []
     *     }
     *
     */
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

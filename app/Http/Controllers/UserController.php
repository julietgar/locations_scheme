<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    /**
     * @api {post} /login Login
     * @apiName Login
     * @apiGroup User
     *
     * @apiParam {String} email Email user.
     * @apiParam {String} password Password user.
     *
     * @apiSuccess {Object[]} success List of options (Array of Objects).
     * @apiSuccess {String} success.token  Token of the User registered.   
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "success": {
     *          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy"
     *       }
     *     }
     *
     */
    public function login()
    {
        if(Auth::attempt(
            [
                'email' => request('email'), 
                'password' => request('password')
            ])){

            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            
            return response()->json(['success' => $success], $this->successStatus);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * @api {post} /register Register
     * @apiName Register
     * @apiGroup User
     *
     * @apiParam {String} name User name.
     * @apiParam {String} email Email user. This is unique.
     * @apiParam {String} password Password user.
     * @apiParam {String} c_password Repeat password user. 
     *
     * @apiSuccess {Object[]} success List of options (Array of Objects).
     * @apiSuccess {String} success.token  Token of the User registered.
     * @apiSuccess {String} success.name  Name of the User registered.     
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "success": {
     *          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy",
     *          "name": "Maria"
     *       }
     *     }
     *
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) 
        {
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }
}
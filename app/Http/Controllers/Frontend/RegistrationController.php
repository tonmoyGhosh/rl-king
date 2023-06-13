<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Validator;

class RegistrationController extends Controller
{
    public function coinAgencyRegisterForm()
    {
        return view('frontend.register.coin-agency');
    }

    public function coinAgencyRegisterStore(Request $request)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(),
                [
                    'name'          => 'required',
                    'email'         => 'required|string|email|max:255|unique:users',
                    'phone_no'      => 'required|unique:users'
                ]);

            if ($validator->fails()) 
            {
                return response()->json(['errors' => $validator->errors()]);
            }

            // User Add
            $user               = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone_no     = $request->phone_no;
            $user->save();

            // Assign User Role
            $user->assignRole('Coin Agency');

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Your Registration Process is Done. We Will Get Back To You Soon'
            ];
        
            return response()->json($response);
            
        } 
        catch (\Exception $e) 
        {   
            DB::rollback();

            $response = [
                'status'    => false,
                'message'   => 'Something Went Wrong! Please Try Again'
            ];
        
            return response()->json($response);
        }
    }

    public function hostAgencyRegisterForm()
    {
        return view('frontend.register.host-agency');
    }

    public function hostAgencyRegisterStore(Request $request)
    {   
        DB::beginTransaction();

        try 
        {
            $validator = Validator::make($request->all(),
                [
                    'name'          => 'required',
                    'email'         => 'required|string|email|max:255|unique:users',
                    'phone_no'      => 'required|unique:users'
                ]);

            if($validator->fails()) 
            {   
                return response()->json(['errors' => $validator->errors()]);
            }

            // User Add
            $user               = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone_no     = $request->phone_no;
            $user->save();

            // Assign User Role
            $user->assignRole('Host Agency');

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'Your Registration Process is Done. We Will Get Back To You Soon'
            ];
        
            return response()->json($response);
            
        } 
        catch (\Exception $e) 
        {   
            DB::rollback();

            $response = [
                'status'    => false,
                'message'   => 'Something Went Wrong! Please Try Again'
            ];
        
            return response()->json($response);
        }
    }
}

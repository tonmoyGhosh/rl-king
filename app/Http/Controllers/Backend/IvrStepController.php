<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IvrSteps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IvrStepController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return IvrSteps::all();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  IvrSteps::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ivr_step_parent = IvrSteps::find($id);
        $ivr_step_parent->deleted_by    = Auth::user()->id;
        $ivr_step_parent->update();

        $ivr_step_parent = IvrSteps::find($id);
        $ivr_step_parent->delete();

        $ivr_step_children  = IvrSteps::where('parent_id', $id)->get();

        foreach ($ivr_step_children as $ivrStepChild){
            $ivrStepChild->deleted_by    = Auth::user()->id;
            $ivrStepChild->update();
            $ivrStepChild->delete();
        }

        $response = [
            'status'    => true,
            'message'   => 'Ivr Mapping deleted successfully!'
        ];


        return response()->json($response);
    }
}

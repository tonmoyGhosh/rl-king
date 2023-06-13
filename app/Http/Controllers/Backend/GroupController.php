<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class GroupController extends Controller
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
    public function index(Request $request)
    {
        $data = [
            'title'    => 'Group List'
        ];
//        return Group::with('contact')->orderByDesc('created_at')->get();

        if($request->ajax())
        {
            $q_group = Group::orderByDesc('created_at');
            return Datatables::of($q_group)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editGroup"><i class=" fi-rr-edit"></i></div>';
                    // if(count($row->contact) == 0){
                    //      $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteGroup"><i class="fi-rr-trash"></i></div>';
                    // }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.group.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Create Groups'
        ];

        return view('backend.group.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//      return response()->json($group);


        $validator = Validator::make($request->all(), [

                'name' => 'required',
                'description' => 'required',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $group                  = new Group();
        $group->name            = $request->name;
        $group->description     = $request->description;
        $group->created_by      = Auth::User()->id;
        $group->save();

        $response = [
            'status'    => true,
            'message'   => 'Group saved successfully!'
        ];

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $data = [
            'title'    => 'Edit Group',
            'group'     => $group
        ];

        return view('backend.group.edit',$data);
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
//        return response()->json($request);

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'description' => 'required',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $group                  = new Group();
        $group                  = Group::find($id);
        $group->name            = $request->name;
        $group->description     = $request->description;
        $group->updated_by      = Auth::User()->id;
        $group->update();

        $response = [
            'status'    => true,
            'message'   => 'Group updated successfully!'
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $group                  = Group::find($id);
        $group->deleted_by      = Auth::User()->id;

        Group::find($id)->delete();

        $group->update();

        $response = [
            'status'    => true,
            'message'   => 'Group deleted successfully!'
        ];

        return response()->json($response);
    }
}

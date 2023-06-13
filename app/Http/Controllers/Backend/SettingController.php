<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IvrFlows;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
use DataTables;

class SettingController extends Controller
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
            'title'    => 'Setting List'
        ];

        if($request->ajax())
        {
            $q_setting = Setting::orderByDesc('created_at');
            return Datatables::of($q_setting)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editSettings"><i class=" fi-rr-edit"></i></div>';
//                    $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteGroup"><i class="fi-rr-trash"></i></div>';
                    return $btn;
                })

                ->addColumn('logos', function($row){

                    $url = \URL::to('/').$row->logo;
                    return "<img src=\"$url\" width='120'/>";
//                    return $img;
                })
                ->rawColumns(['logos','action'])
                ->make(true);
        }

        return view('backend.setting.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Create Setting'
        ];

        return view('backend.setting.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'app_name' => 'required',
            'company_name' => 'required',
            'logo' => 'required',
            'mask_name' => 'required',
            'sender_ids' => 'required',
            // 'ivr_massage_body' => 'required',
            'company_address'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $uploadedFile = $request->file('logo');
        $filename = $uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'public/logo/',$uploadedFile,$filename
        );
        $logo = Storage::url('logo/'.$filename);

        $setting                         = new Setting();
        $setting->app_name               = $request->app_name;
        $setting->company_name           = $request->company_name;
        $setting->company_address        = $request->company_address;
        $setting->logo                   = $logo;
        $setting->mask_name              = $request->mask_name;
        $setting->sender_ids             = $request->sender_ids;
        // $setting->ivr_massage_body       = $request->ivr_massage_body;
        $setting->created_by             = Auth::User()->id;
        $setting->save();

        $response = [
            'status'    => true,
            'message'   => 'Setting saved successfully!'
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
        $setting = Setting::find($id);
        $data = [
            'title'    => 'Edit Setting',
            'setting'     => $setting
        ];

        return view('backend.setting.edit', $data);
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
        $validator = Validator::make($request->all(), [

            'app_name' => 'required',
            'company_name' => 'required',
            'logo' => '',
            'mask_name' => 'required',
            'sender_ids' => 'required',
            // 'ivr_massage_body' => 'required',
            'company_address'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }


        if($request->file('logo') != null){
            $setting = Setting::find($id);
//        $str = 'storage/logo/1.png';
            $str = $setting->logo;
            $headers = explode('/', $str,3);
            $slice = $headers[2];
            unlink(storage_path('app/public/'.$slice));

            $uploadedFile = $request->file('logo');
            $filename = $uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'public/logo/',$uploadedFile,$filename
            );
            $logo = Storage::url('logo/'.$filename);
            $setting->logo               = $logo;
            $setting->update();
        }


        $setting                         = Setting::find($id);
        $setting->app_name               = $request->app_name;
        $setting->company_name           = $request->company_name;
        $setting->company_address        = $request->company_address;
        $setting->mask_name              = $request->mask_name;
        $setting->sender_ids             = $request->sender_ids;
        // $setting->ivr_massage_body       = $request->ivr_massage_body;
        $setting->updated_by             = Auth::User()->id;
        $setting->save();

        $response = [
            'status'    => true,
            'message'   => 'Setting updated successfully!'
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        $setting                  = Setting::find($id);
//        $setting->deleted_by      = Auth::User()->id;
//
//        Setting::find($id)->delete();
//
//        $setting->update();
//
//        $response = [
//            'status'    => true,
//            'message'   => 'Setting deleted successfully!'
//        ];
//
//        return response()->json($response);
//    }
}

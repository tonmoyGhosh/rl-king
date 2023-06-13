<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IvrFlows;
use App\Models\IvrSteps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Validator;
use DB;
use Carbon\Carbon;

class IvrMappingController extends Controller
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
            'title'    => 'IVR Mapping List'
        ];
//        return IvrFlows::with('user')->orderByDesc('created_at')->get();
//        return IvrFlows::with('user','ivr_campaign')->orderByDesc('created_at')->get();

        if($request->ajax())
        {
            $q_ivrflows = IvrFlows::with('user','ivr_campaign')->orderByDesc('created_at');
            return Datatables::of($q_ivrflows)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '';

                    $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 showivrmapping"><i class=" fi-rr-eye"></i></div>';
                    $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editGroup"><i class=" fi-rr-edit"></i></div>';
                    if(count($row->ivr_campaign) == 0) {
                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteMapping"><i class="fi-rr-trash"></i></div>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.ivr-mapping.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Create IVR Mapping'
        ];

        return view('backend.ivr-mapping.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return response()->json($request);

        DB::beginTransaction();

        try {
            $uploadedFile1 = $request->file('pre_recorded_file');
            $filename1 = "Intro1.".$uploadedFile1->getClientOriginalExtension();



            $uploadedFile2 = $request->file('expectation_file');
            $filename2 = "Intro2.".$uploadedFile2->getClientOriginalExtension();


            $levelArr = $request->level;
            $keyPressArr = $request->key_press;
            $titleArr = $request->title;
            $nodeTypeArr = $request->node_type;
            $uploadVoiceArr = $request->file('upload_voice');


            if(count($levelArr) != 0)
            {
                // Process Data Format Array
                $resultArr = [];
                foreach($levelArr as $key => $level)
                {
                    if($level == 1 && $key == 0)
                    {
                        $serial = 0;
                        $serial2 = 0;

                        $resultArr[$serial]['title']        = $titleArr[$key];
                        $resultArr[$serial]['key_press']    = $keyPressArr[$key];
                        $resultArr[$serial]['node_type']    = $nodeTypeArr[$key];
                        $resultArr[$serial]['level']        = $levelArr[$key];
                        $resultArr[$serial]['file']         = $uploadVoiceArr[$key];

                    }
                    else if($level == 1 && $key != 0)
                    {
                        $serial = $serial + 1;
                        $serial2 = 0;

                        $resultArr[$serial]['title']        = $titleArr[$key];
                        $resultArr[$serial]['key_press']    = $keyPressArr[$key];
                        $resultArr[$serial]['node_type']    = $nodeTypeArr[$key];
                        $resultArr[$serial]['level']        = $levelArr[$key];
                        $resultArr[$serial]['file']         = $uploadVoiceArr[$key];

                    }
                    else
                    {
                        $resultArr[$serial]['child'][$serial2]['title']        = $titleArr[$key];
                        $resultArr[$serial]['child'][$serial2]['key_press']    = $keyPressArr[$key];
                        $resultArr[$serial]['child'][$serial2]['node_type']    = $nodeTypeArr[$key];
                        $resultArr[$serial]['child'][$serial2]['level']        = $levelArr[$key];
                        $resultArr[$serial]['child'][$serial2]['file']         = $uploadVoiceArr[$key];

                        $serial2 = $serial2 + 1;


                    }
                }

//            return $resultArr;

                // Upload Clip Files
                // $uploadedFile = $request->file('pre-recorded-file');
                // $file = $request->file->store('storage/public/ivr-clip');

                // Add IVR Flows
                $ivrFlow                    = new IvrFlows();
                $ivrFlow->title             = $request->ivr_mapping_title;
                $ivrFlow->intro_url         = "NULL";
                $ivrFlow->input_list_url    = "NULL";
                $ivrFlow->created_by        = Auth::user()->id;
                $ivrFlow->save();


                Storage::disk('local')->putFileAs(
                    'public/ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/",$uploadedFile1,$filename1
                );

                Storage::disk('local')->putFileAs(
                    'public/ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/",$uploadedFile2,$filename2
                );

                $contents = Storage::url('ivr-clip/'.$ivrFlow->title."_".$ivrFlow->id."/".$filename1);
//            return $contents;
                $contents2 = Storage::url('ivr-clip/'.$ivrFlow->title."_".$ivrFlow->id."/".$filename2);

                $ivrFlow                    = IvrFlows::find($ivrFlow->id);
                $ivrFlow->intro_url         = $contents;
                $ivrFlow->input_list_url    = $contents2;
//            return $ivrFlow;
                $ivrFlow->update();


                // Add
                foreach($resultArr as $record)
                {
                    $ivrStep                    = new IvrSteps();
                    $ivrStep->ivr_flow_id       = $ivrFlow->id;
                    $ivrStep->title             = $record['title'];
                    $ivrStep->key_press         = $record['key_press'];
                    $ivrStep->type              = $record['node_type'];
                    $ivrStep->level             = $record['level'];
                    $ivrStep->created_by        = Auth::user()->id;

                    $uploadedFile = $record['file'];
                    $filename = "step".$ivrStep->key_press.".".$uploadedFile->getClientOriginalExtension();

                    Storage::disk('local')->putFileAs(
                        'public/ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/",$uploadedFile,$filename
                    );

//                 $ivr_steps = Storage::url('ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/".$filename);

                    $ivrStep->clip_url  = Storage::url('ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/".$filename);;

                    $ivrStep->save();

                    if(isset($record['child'])){
                        foreach($record['child'] as $childRecord)
                        {
                            $ivrStepChild                    = new IvrSteps();
                            $ivrStepChild->ivr_flow_id       = $ivrFlow->id;
                            $ivrStepChild->title             = $childRecord['title'];
                            $ivrStepChild->key_press         = $childRecord['key_press'];
                            $ivrStepChild->type              = $childRecord['node_type'];
                            $ivrStepChild->level             = $childRecord['level'];
                            $ivrStepChild->parent_id         = $ivrStep->id;
                            $ivrStepChild->created_by        = Auth::user()->id;


                            $uploadedFile = $childRecord['file'];

                            $filename = "step".$ivrStep->key_press."step".$ivrStepChild->key_press.".".$uploadedFile->getClientOriginalExtension();

                            Storage::disk('local')->putFileAs(
                                'public/ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/",$uploadedFile,$filename
                            );
                            $ivrStepChild->clip_url  = Storage::url('ivr-clip/'.$request->ivr_mapping_title."_".$ivrFlow->id."/".$filename);

                            $ivrStepChild->save();
                        }
                    }
                }
            }

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'IVR Mapping Saved successfully!'
            ];

            return response()->json($response);

        } catch (Exception $e) {
            DB::rollback();
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ivr_mapping = IvrFlows::with(['ivr_step' => function ($query) {
            $query->where('parent_id', null)
                ->with('childSteps');
        }])->find($id);

//        return $ivr_mapping;

        $data = [
            'title'              => 'IVR Mapping Details',
            'ivrMapping'         => $ivr_mapping,

        ];

        return view('backend.ivr-mapping.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ivr_flows = IvrFlows::with(['ivr_step' => function ($query) {
            $query->where('parent_id', null)
                ->with('childSteps');
        }])->find($id);

//        return $ivr_flows;
        $data = [
            'title'        => 'Edit IVR Mapping',
            'ivr_flow'     => $ivr_flows
        ];

        return view('backend.ivr-mapping.edit',$data);
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
        DB::beginTransaction();

        try {


            $idArr = $request->id;
            $levelArr = $request->level;
            $keyPressArr = $request->key_press;
            $titleArr = $request->title;
            $nodeTypeArr = $request->node_type;
            if($request->file('upload_voice') !== null) {
                $uploadVoiceArr = $request->file('upload_voice');
            }

            if(count($levelArr) != 0)
            {
                // Process Data Format Array
                $resultArr = [];
                foreach($levelArr as $key => $level)
                {
                    if($level == 1 && $key == 0)
                    {
                        $serial = 0;
                        $serial2 = 0;
                        $resultArr[$serial]['id']           = $idArr[$key];
                        $resultArr[$serial]['title']        = $titleArr[$key];
                        $resultArr[$serial]['key_press']    = $keyPressArr[$key];
                        $resultArr[$serial]['node_type']    = $nodeTypeArr[$key];
                        $resultArr[$serial]['level']        = $levelArr[$key];
                        if(isset($uploadVoiceArr[$key])){
                            $resultArr[$serial]['file']         = $uploadVoiceArr[$key];
                        }

                    }
                    else if($level == 1 && $key != 0)
                    {
                        $serial = $serial + 1;
                        $serial2 = 0;

                        $resultArr[$serial]['id']           = $idArr[$key];
                        $resultArr[$serial]['title']        = $titleArr[$key];
                        $resultArr[$serial]['key_press']    = $keyPressArr[$key];
                        $resultArr[$serial]['node_type']    = $nodeTypeArr[$key];
                        $resultArr[$serial]['level']        = $levelArr[$key];
                        if(isset($uploadVoiceArr[$key])){
                            $resultArr[$serial]['file']         = $uploadVoiceArr[$key];
                        }

                    }
                    else
                    {
                        $resultArr[$serial]['child'][$serial2]['id']           = $idArr[$key];
                        $resultArr[$serial]['child'][$serial2]['title']        = $titleArr[$key];
                        $resultArr[$serial]['child'][$serial2]['key_press']    = $keyPressArr[$key];
                        $resultArr[$serial]['child'][$serial2]['node_type']    = $nodeTypeArr[$key];
                        $resultArr[$serial]['child'][$serial2]['level']        = $levelArr[$key];
                        if(isset($uploadVoiceArr[$key])){
                            $resultArr[$serial]['child'][$serial2]['file']     = $uploadVoiceArr[$key];
                        }

                        $serial2 = $serial2 + 1;


                    }
                }

                // Add IVR Flows
                $ivrFlow                    = IvrFlows::find($id);
                $ivrFlow->title             = $request->ivr_mapping_title;

                $ivrFlow->updated_by        = Auth::user()->id;

                if(($request->file('pre_recorded_file')) !== null){
                    $uploadedFile1 = $request->file('pre_recorded_file');
                    $filename1 = "Intro1.".$uploadedFile1->getClientOriginalExtension();
                    Storage::disk('local')->putFileAs(
                        'public/ivr-clip/'.$request->ivr_mapping_title."_".$id."/",$uploadedFile1,$filename1
                    );
                    $contents = Storage::url('ivr-clip/'.$ivrFlow->title."_".$id."/".$filename1);
                    $ivrFlow->intro_url         = $contents;
                }

                if(($request->file('expectation_file')) !== null){
                    $uploadedFile2 = $request->file('expectation_file');
                    $filename2 = "Intro2.".$uploadedFile2->getClientOriginalExtension();
                    Storage::disk('local')->putFileAs(
                        'public/ivr-clip/'.$request->ivr_mapping_title."_".$id."/",$uploadedFile2,$filename2
                    );
                    $contents2 = Storage::url('ivr-clip/'.$ivrFlow->title."_".$id."/".$filename2);
                    $ivrFlow->input_list_url    = $contents2;
                }

                $ivrFlow->save();


                // Add
                foreach($resultArr as $record)
                {
                    if($record['id'] !== null){
                        $ivrStep                = IvrSteps::find($record['id']);
                    }else{
                        $ivrStep                = new IvrSteps();
                    }
                    $ivrStep->ivr_flow_id       = $id;
                    $ivrStep->title             = $record['title'];
                    $ivrStep->key_press         = $record['key_press'];
                    $ivrStep->type              = $record['node_type'];
                    $ivrStep->level             = $record['level'];

                    if($record['id'] !== null){
                        $ivrStep->updated_by    = Auth::user()->id;
                    }else{
                        $ivrStep->created_by    = Auth::user()->id;
                    }

                    if(isset($record['file'])) {

                        $uploadedFile = $record['file'];

                        $filename = "step" . $ivrStep->key_press . "step" . $ivrStep->key_press . "." . $uploadedFile->getClientOriginalExtension();

                        Storage::disk('local')->putFileAs(
                            'public/ivr-clip/' . $request->ivr_mapping_title . "_" . $id . "/", $uploadedFile, $filename
                        );
                        $ivrStep->clip_url = Storage::url('ivr-clip/' . $request->ivr_mapping_title . "_" . $id . "/" . $filename);
                    }

                    $ivrStep->save();

                    if(isset($record['child'])){
                        foreach($record['child'] as $childRecord)
                        {
                            if($childRecord['id'] !== null){
                                $ivrStepChild                = IvrSteps::find($childRecord['id']);
                            }else{
                                $ivrStepChild                = new IvrSteps();
                            }
                            $ivrStepChild->ivr_flow_id       = $id;
                            $ivrStepChild->title             = $childRecord['title'];
                            $ivrStepChild->key_press         = $childRecord['key_press'];
                            $ivrStepChild->type              = $childRecord['node_type'];
                            $ivrStepChild->level             = $childRecord['level'];
                            $ivrStepChild->parent_id         = $ivrStep->id;

                            if($childRecord['id'] !== null){
                                $ivrStepChild->updated_by    = Auth::user()->id;
                            }else{
                                $ivrStepChild->created_by    = Auth::user()->id;
                            }


                            if(isset($childRecord['file'])) {

                                $uploadedFile = $childRecord['file'];

                                $filename = "step" . $ivrStep->key_press . "step" . $ivrStepChild->key_press . "." . $uploadedFile->getClientOriginalExtension();

                                Storage::disk('local')->putFileAs(
                                    'public/ivr-clip/' . $request->ivr_mapping_title . "_" . $id . "/", $uploadedFile, $filename
                                );
                                $ivrStepChild->clip_url = Storage::url('ivr-clip/' . $request->ivr_mapping_title . "_" . $id . "/" . $filename);
                            }

                            $ivrStepChild->save();
                        }
                    }
                }
            }

            DB::commit();

            $response = [
                'status'    => true,
                'message'   => 'IVR Mapping Saved successfully!'
            ];

            return response()->json($response);

        } catch (Exception $e) {
            DB::rollback();
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ivr_flows = IvrFlows::find($id);
        $ivr_flows->deleted_by    = Auth::user()->id;

        IvrFlows::find($id)->delete();
        $ivr_flows->update();

        $ivr_steps  = IvrSteps::where('ivr_flow_id', $id)->get();

        foreach ($ivr_steps as $ivrSteps){
            $ivrSteps->deleted_by    = Auth::user()->id;
            IvrSteps::where('ivr_flow_id', $ivrSteps->id)->delete();
            $ivrSteps->update();
        }

        $response = [
            'status'    => true,
            'message'   => 'Ivr Mapping deleted successfully!'
        ];


        return response()->json($response);
    }
}

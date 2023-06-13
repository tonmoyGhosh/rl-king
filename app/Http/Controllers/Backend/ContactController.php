<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;
use App\Exports\ContactsExport;
use DataTables;
use Validator;
use Config;

class ContactController extends Controller
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
            'title'    => 'Contact List'
        ];

        if ($request->ajax()) {
            $q_contact = Contact::with(['group' => function ($query) {
                $query->select('id', 'name');
            }])->with('group.smsCampaigns')->orderByDesc('created_at');
            return DataTables::of($q_contact)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editContact"><i class=" fi-rr-edit"></i></div>';

                    if (count($row->group->smsCampaigns) == 0) {
                        $btn = $btn . ' <div data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteContact"><i class="fi-rr-trash"></i></div>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.contact.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'    => 'Create Contact',
            'groupList' => Group::all(),
            'stakeholders'=> Config::get('contact.stakeholder'),
        ];

        return view('backend.contact.create', $data);
    }

    public function import()
    {

        $data = [
            'title'    => 'Import Contact',
            'groupList' => Group::all(),
        ];

        return view('backend.contact.import', $data);
    }

    public function fileImport(Request $request)
    {

        Excel::import(new ContactsImport($request->group_id, Auth::User()->id), $request->file('xlsFile'));

        $response = [
            'status'    => true,
            'message'   => 'Contact saved successfully!'
        ];

        return response()->json($response);
    }

    public function fileExport()
    {
        return Excel::download(new ContactsExport, 'conatcts.xlsx');
        $response = [
            'status'    => true,
            'message'   => 'Contact downloaded successfully!'
        ];

        return response()->json($response);
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

            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $contact            = new Contact();
        $contact->name      = $request->name;
        $contact->group_id     = $request->group_id;
        $contact->stakeholder     = $request->stakeholder;
        $contact->occupation     = $request->occupation;
        $contact->school      = $request->school;
        $contact->grade     = $request->grade;
        $contact->gender     = $request->gender;
        $contact->area      = $request->area;
        $contact->district     = $request->district;
        $contact->division     = $request->division;
        $contact->phone_number      = $request->phone_number;
        $contact->created_by     = Auth::User()->id;

        $contact->save();

        $response = [
            'status'    => true,
            'message'   => 'Contact saved successfully!'
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
        $contact = Contact::find($id);
        $data = [
            'title'    => 'Edit Contact',
            'contact'     => $contact,
            'groupList' => Group::all(),
            'stakeholders'=> Config::get('contact.stakeholder'),
        ];


        return view('backend.contact.edit', $data);
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

            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $contact                  = new Contact();
        $contact                  = Contact::find($id);
        $contact->name            = $request->name;
        $contact->stakeholder     = $request->stakeholder;
        $contact->group_id        = $request->group_id;
        $contact->occupation      = $request->occupation;
        $contact->school          = $request->school;
        $contact->grade           = $request->grade;
        $contact->gender          = $request->gender;
        $contact->area            = $request->area;
        $contact->district        = $request->district;
        $contact->division        = $request->division;
        $contact->phone_number    = $request->phone_number;
        $contact->updated_by      = Auth::User()->id;

        $contact->update();

        $response = [
            'status'    => true,
            'message'   => 'Contact updated successfully!'
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
        $contact                  = Contact::find($id);
        $contact->deleted_by      = Auth::User()->id;
        Contact::find($id)->delete();

        $contact->update();

        $response = [
            'status'    => true,
            'message'   => 'Contact deleted successfully!'
        ];

        return response()->json($response);
    }
}

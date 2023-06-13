<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = [
            'count_user' => Currency::latest()->count(),
            'title'    => 'Currency List'
        ];

        if ($request->ajax()) 
        {
            $q_user = Currency::select('*')->orderBy('id', 'ASC');

            return Datatables::of($q_user)
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.currency.index', $data);
    }
}

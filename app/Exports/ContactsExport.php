<?php

namespace App\Exports;

use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport implements FromCollection
{
    use Exportable;
    public function collection()
    {
        return Contact::select('group_id','phone_number')->get();
    }

//    public function __construct(int $year)
//    {
//        $this->year = $year;
//    }
//
//
//    public function query()
//    {
//        return Contact::query()->whereYear('created_at', $this->year);
//    }
}

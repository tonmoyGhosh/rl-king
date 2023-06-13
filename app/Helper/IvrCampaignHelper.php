<?php

namespace App\Helper;

use DB;

class IvrCampaignHelper
{

    private function getTargetAudienceRecords($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            });

        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }

        $allRecord->select(DB::raw('UPPER(contacts.stakeholder) as stakeholder, UPPER(contacts.gender) as gender,
                    UPPER(contacts.area) as area, UPPER(contacts.district) as district, UPPER(contacts.division) as division'), 'contacts.grade', 'contacts.phone_number as phone_number', 'contacts.name', 'contacts.occupation')
            ->groupBy(
                'contacts.phone_number',
                'contacts.area',
                'contacts.district',
                'contacts.division',
                'contacts.stakeholder',
                'contacts.gender',
                'contacts.grade'
            );

        $responseData = $allRecord->get();

        return $responseData;
    }

    public function getTargetAudience($filterList = [])
    {
        $allRecord = $this->getTargetAudienceRecords($filterList);

        return $allRecord;
    }

    public function getTargetAudienceReceived($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            });

        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }
        $allRecord->select(DB::raw('UPPER(contacts.stakeholder) as stakeholder, UPPER(contacts.gender) as gender,
                    UPPER(contacts.area) as area, UPPER(contacts.district) as district, UPPER(contacts.division) as division'), 'contacts.grade', 'contacts.phone_number as phone_number')
            ->where('campaign_with_contacts.called', 'Yes')
            ->whereNotNull('campaign_with_contacts.uniqueid')
            ->groupBy(
                'contacts.phone_number',
                'contacts.area',
                'contacts.district',
                'contacts.division',
                'contacts.stakeholder',
                'contacts.gender',
                'contacts.grade'
            );

        $responseData = $allRecord->get();

        return $responseData;
    }


    // This functions returns all targeted audiences
    // Based on stakeholder wise
    public function targetAudienceStakeholderWise($filterList = [])
    {
        $allRecord = $this->getTargetAudienceRecords($filterList);

        $staffRecordTotal = $allRecord->where('stakeholder', 'STAFF')->count();
        $studentRecordTotal = $allRecord->where('stakeholder', 'STUDENT')->count();
        $teacherRecordTotal = $allRecord->where('stakeholder', 'TEACHER')->count();
        $govtRecordTotal = $allRecord->where('stakeholder', 'GOVT')->count();
        $unspecifiedRecordTotal = $allRecord->where('stakeholder', null)->count();

        $data = [
            'staffRecordTotal'              => $staffRecordTotal,
            'studentRecordTotal'            => $studentRecordTotal,
            'teacherRecordTotal'            => $teacherRecordTotal,
            'govtRecordTotal'               => $govtRecordTotal,
            'unspecifiedRecordTotal'        => $unspecifiedRecordTotal,
            'total'                         => $allRecord->count()
        ];

        return $data;
    }


    // This functions returns all targeted audiences
    // Based on grade wise
    public function targetAudienceGradeWise($filterList = [])
    {
        $allRecord = $this->getTargetAudienceRecords($filterList);

        $class1RecordTotal = $allRecord->where('stakeholder', 'STUDENT')->where('grade', '1')->count();
        $class2RecordTotal = $allRecord->where('stakeholder', 'STUDENT')->where('grade', '2')->count();
        $class3RecordTotal = $allRecord->where('stakeholder', 'STUDENT')->where('grade', '3')->count();
        $class4RecordTotal = $allRecord->where('stakeholder', 'STUDENT')->where('grade', '4')->count();
        $class5RecordTotal = $allRecord->where('stakeholder', 'STUDENT')->where('grade', '5')->count();
        $classUnspecifiedRecordTotal = $allRecord->where('stakeholder', 'STUDENT')->where('grade', null)->count();

        $data = [
            'class1RecordTotal'              => $class1RecordTotal,
            'class2RecordTotal'              => $class2RecordTotal,
            'class3RecordTotal'              => $class3RecordTotal,
            'class4RecordTotal'              => $class4RecordTotal,
            'class5RecordTotal'              => $class5RecordTotal,
            'classUnspecifiedRecordTotal'    => $classUnspecifiedRecordTotal,
            'total'                          => $class1RecordTotal + $class2RecordTotal + $class3RecordTotal
                + $class4RecordTotal + $class5RecordTotal + $classUnspecifiedRecordTotal,
        ];

        return $data;
    }

    // This function returns all targeted audiences
    // Based on area wise
    public function targetAudienceAreaWise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $areaList = [];
        if ($filterList['area']) {
            if ($filterList['area'] == 'Unspecified') {
                $areaList = DB::table('contacts')->where('area', null)->groupBy('area')->pluck('area');
            } else {
                $areaList = DB::table('contacts')->where('area', $filterList['area'])->groupBy('area')->pluck('area');
            }
        } else if ($filterList['district']) {
            if ($filterList['district'] == 'Unspecified') {
                $areaList = DB::table('contacts')->where('district', null)->groupBy('area')->pluck('area');
            } else {
                $areaList = DB::table('contacts')->where('district', $filterList['district'])->groupBy('area')->pluck('area');
            }
        } else if ($filterList['division']) {
            if ($filterList['division'] == 'Unspecified') {
                $areaList = DB::table('contacts')->where('division', null)->groupBy('area')->pluck('area');
            } else {
                $areaList = DB::table('contacts')->where('division', $filterList['division'])->groupBy('area')->pluck('area');
            }
        } else $areaList = DB::table('contacts')->groupBy('area')->pluck('area');

        $data = [];
        if ($areaList) {
            $allRecord = $this->getTargetAudienceRecords($filterList);

            foreach ($areaList as $key => $area) {
                $data[($area) ? $area : 'Unspecified'] = $allRecord->where('area', strtoupper($area))->count();
            }
        }

        return $data;
    }



    // This function return all ivr outbounds calls details
    // Based on all categories
    public function ivrOutBoundsCallDetails($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;

        $allRecord = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->leftJoin('ivr_log', 'ivr_log.uniqueid', 'campaign_with_contacts.uniqueid')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            });


        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }


        $allRecord->where('campaign_with_contacts.called', 'Yes')
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder,UPPER(contacts.area) as area, UPPER(contacts.district) as district,
                            UPPER(contacts.division) as division, UPPER(contacts.gender) as gender, DATE_FORMAT(campaign_with_contacts.start_at, "%Y-%m-%d") as start_at, HOUR(start_at) as fromHour'),
                'contacts.grade',
                'campaign_with_contacts.uniqueid',
                'campaign_with_contacts.called',
                'campaign_with_contacts.sms_send',
                'ivr_log.duration',
                'ivr_log.response1',
                'ivr_log.response2'
            );

        $responseData = $allRecord->get();

        return $responseData;
    }

    // This function return all ivr outbounds received calls details
    // Based on all categories
    public function ivrOutBoundsReceivedCallDetails($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;

        $allRecord = DB::table('contacts')
            ->join('campaign_with_contacts', 'campaign_with_contacts.contact_id', 'contacts.id')
            ->leftJoin('ivr_log', 'ivr_log.uniqueid', 'campaign_with_contacts.uniqueid')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(campaign_with_contacts.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            });


        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }


        $allRecord->where('campaign_with_contacts.called', 'Yes')
            ->whereNotNull('campaign_with_contacts.uniqueid')
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder,UPPER(contacts.area) as area, UPPER(contacts.district) as district,
                            UPPER(contacts.division) as division, UPPER(contacts.gender) as gender'),
                'contacts.grade',
                'campaign_with_contacts.uniqueid',
                'campaign_with_contacts.called',
                'campaign_with_contacts.sms_send',
                'ivr_log.duration',
                'ivr_log.response1',
                'ivr_log.response2'
            );

        $responseData = $allRecord->get();

        return $responseData;
    }

    // This function returns all call details
    // Based on area wise
    public function callDetailsAreaWise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $areaList = [];
        if ($filterList['area']) {
            if ($filterList['area'] == 'Unspecified') {
                $areaList = DB::table('contacts')->where('area', null)->groupBy('area')->pluck('area');
            } else {
                $areaList = DB::table('contacts')->where('area', $filterList['area'])->groupBy('area')->pluck('area');
            }
        } else if ($filterList['district']) {
            if ($filterList['district'] == 'Unspecified') {
                $areaList = DB::table('contacts')->where('district', null)->groupBy('area')->pluck('area');
            } else {
                $areaList = DB::table('contacts')->where('district', $filterList['district'])->groupBy('area')->pluck('area');
            }
        } else if ($filterList['division']) {
            if ($filterList['division'] == 'Unspecified') {
                $areaList = DB::table('contacts')->where('division', null)->groupBy('area')->pluck('area');
            } else {
                $areaList = DB::table('contacts')->where('division', $filterList['division'])->groupBy('area')->pluck('area');
            }
        } else $areaList = DB::table('contacts')->groupBy('area')->pluck('area');

        $data = [];
        if ($areaList) {
            $allRecord = $this->ivrOutBoundsCallDetails($filterList);

            foreach ($areaList as $key => $area) {
                $areaTotalCount[($area) ? $area : 'Unspecified'] = $allRecord->where('area', strtoupper($area))->where('called', 'Yes')->count();
            }

            foreach ($areaList as $key => $area) {
                $totalCallReceived[($area) ? $area : 'Unspecified'] = $allRecord->where('area', strtoupper($area))
                    ->whereNotNull('uniqueid')->where('called', 'Yes')->count();
            }

            foreach ($areaList as $key => $area) {
                $totalCallCompleted[($area) ? $area : 'Unspecified'] = $allRecord->where('area', strtoupper($area))
                    ->whereNotNull('uniqueid')->where('called', 'Yes')
                    ->where('response1', '!=', '')->where('response2', '!=', '')->count();
            }

            foreach ($areaList as $key => $area) {
                $totalCallFailed[($area) ? $area : 'Unspecified'] = $allRecord->where('area', strtoupper($area))
                    ->whereNotNull('uniqueid')->where('called', 'Yes')
                    ->where('duration', '<', '30')->count();
            }

            $allInRecord = $this->ivrInBoundsReceivedCallDetailsForRegisterReport($filterList);

            foreach ($areaList as $key => $area) {
                $totalInboundCall[($area) ? $area : 'Unspecified'] = $allInRecord->where('area', strtoupper($area))
                    // ->where('response1', '!=', '')
                    ->count();
            }

            foreach ($areaList as $key => $area) {
                $areaList1[($area) ? $area : 'Unspecified'] = 1;
            }
        }

        return $data = [
            'area' => array_keys($areaList1),
            'areaTotalCount' => $areaTotalCount,
            'totalCallReceived' => $totalCallReceived,
            'totalCallCompleted' => $totalCallCompleted,
            'totalCallFailed'   => $totalCallFailed,
            'totalInboundCall' => $totalInboundCall,
        ];
    }

    // This function return all ivr inbounds calls details
    // Based on all categories
    public function ivrInBoundsCallDetails($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('ivr_log_in', 'ivr_log_in.customer_number', 'contacts.phone_number')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '<=', $dateTo);
            });
        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }

        $allRecord
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder,UPPER(contacts.area) as area, UPPER(contacts.district) as district,
                            UPPER(contacts.division) as division, UPPER(contacts.gender) as gender,ivr_log_in.id, DATE_FORMAT(ivr_log_in.calldate, "%Y-%m-%d") as calldate'),
                'contacts.grade',
                'contacts.phone_number as phone_number',
                'contacts.name',
                'contacts.occupation',
                'ivr_log_in.uniqueid',
                DB::raw('(floor(ivr_log_in.billsec/59)*59+if(mod(ivr_log_in.billsec,59)=0,0,59))/60 as duration'),
                'ivr_log_in.response1',
                'ivr_log_in.response2'
            )
            ->groupBy('ivr_log_in.id');
        $responseData = $allRecord->get();

        return $responseData;
    }

    public function ivrInBoundsCallDetailsUnregisterd($filterList = ['dateFrom' => null, 'dateTo' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;


        $allRecord = DB::table('ivr_log_in')
            ->leftJoin('contacts', 'contacts.phone_number', 'ivr_log_in.customer_number')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '<=', $dateTo);
            })
            ->where('contacts.phone_number', null)
            ->select(
                'ivr_log_in.customer_number as phone_number',
                'ivr_log_in.uniqueid',
                DB::raw('(floor(ivr_log_in.billsec/59)*59+if(mod(ivr_log_in.billsec,59)=0,0,59))/60 as duration'),
                'ivr_log_in.response1',
                'ivr_log_in.response2'
            )
            ->groupBy('ivr_log_in.id')
            ->get();

        return $allRecord;
    }


    // This function return all ivr inbounds received calls details
    // Based on all categories
    public function ivrInBoundsReceivedCallDetails($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('ivr_log_in', 'ivr_log_in.customer_number', 'contacts.phone_number')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '<=', $dateTo);
            });
        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }
        $allRecord->where('ivr_log_in.response2', '!=', '')
            ->whereNotNull('ivr_log_in.uniqueid')
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder,UPPER(contacts.area) as area, UPPER(contacts.district) as district,
                            UPPER(contacts.division) as division, UPPER(contacts.gender) as gender,ivr_log_in.id'),
                'contacts.grade',
                'ivr_log_in.uniqueid',
                DB::raw('(floor(ivr_log_in.billsec/59)*59+if(mod(ivr_log_in.billsec,59)=0,0,59))/60 as duration'),
                'ivr_log_in.response1',
                'ivr_log_in.response2'
            )
            ->groupBy('ivr_log_in.id');
        $responseData = $allRecord->get();

        return $responseData;
    }

    public function ivrInBoundsReceivedCallDetailsForRegisterReport($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('ivr_log_in', 'ivr_log_in.customer_number', 'contacts.phone_number')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '<=', $dateTo);
            });
        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }
        $allRecord
            ->where('ivr_log_in.uniqueid', '!=', '')
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder,UPPER(contacts.area) as area, UPPER(contacts.district) as district,
                            UPPER(contacts.division) as division, UPPER(contacts.gender) as gender,ivr_log_in.id'),
                'contacts.grade',
                'ivr_log_in.uniqueid',
                DB::raw('(floor(ivr_log_in.billsec/59)*59+if(mod(ivr_log_in.billsec,59)=0,0,59))/60 as duration'),
                'ivr_log_in.response1',
                'ivr_log_in.response2'
            )
            ->groupBy('ivr_log_in.id');
        $responseData = $allRecord->get();

        return $responseData;
    }

    public function outboundCallMintuesStakeholderwise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('ivr_log', 'ivr_log.customer_number', 'contacts.phone_number')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log.calldate, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log.calldate, '%Y-%m-%d')"), '<=', $dateTo);
            });
        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }

        $allRecord
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder'),
                DB::raw('(floor(ivr_log.billsec/59)*59+if(mod(ivr_log.billsec,59)=0,0,59))/60 as duration')
            )
            ->groupBy('ivr_log.id');
        $responseData = $allRecord->get();

        return $responseData;
    }

    public function inboundCallMintuesStakeholderwise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom       = $filterList['dateFrom'] ?? null;
        $dateTo         = $filterList['dateTo'] ?? null;
        $gender         = $filterList['gender'] ?? null;
        $stakeholder    = $filterList['stakeholder'] ?? null;
        $grade          = $filterList['grade'] ?? null;
        $area           = $filterList['area'] ?? null;
        $district       = $filterList['district'] ?? null;
        $division       = $filterList['division'] ?? null;

        $gender         = ($gender) ? strtoupper($gender) : null;
        $stakeholder    = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade          = ($grade) ? strtoupper($grade) : null;
        $area           = ($area) ? strtoupper($area) : null;
        $district       = ($district) ? strtoupper($district) : null;
        $division       = ($division) ? strtoupper($division) : null;


        $allRecord = DB::table('contacts')
            ->join('ivr_log_in', 'ivr_log_in.customer_number', 'contacts.phone_number')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(ivr_log_in.calldate, '%Y-%m-%d')"), '<=', $dateTo);
            });
        if ($gender && $gender != null) {
            if ($gender == 'UNSPECIFIED') $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', 'UNSPECIFIED');
            else $allRecord->where(DB::raw('UPPER(contacts.gender)'), '=', $gender);
        }
        if ($grade && $grade != null) {
            if ($grade == 'UNSPECIFIED') $allRecord->whereNull('contacts.grade');
            else $allRecord->where(DB::raw('UPPER(contacts.grade)'), '=', $grade);
        }
        if ($stakeholder && $stakeholder != null) {
            if ($stakeholder == 'UNSPECIFIED') $allRecord->whereNull('contacts.stakeholder');
            else $allRecord->where(DB::raw('UPPER(contacts.stakeholder)'), '=', $stakeholder);
        }
        if ($area && $area != null) {
            if ($area == 'UNSPECIFIED') $allRecord->whereNull('contacts.area');
            else $allRecord->where(DB::raw('UPPER(contacts.area)'), '=', $area);
        }
        if ($district && $district != null) {
            if ($district == 'UNSPECIFIED') $allRecord->whereNull('contacts.district');
            else $allRecord->where(DB::raw('UPPER(contacts.district)'), '=', $district);
        }
        if ($division && $division != null) {
            if ($division == 'UNSPECIFIED') $allRecord->whereNull('contacts.division');
            else $allRecord->where(DB::raw('UPPER(contacts.division)'), '=', $division);
        }

        $allRecord
            ->select(
                DB::raw('UPPER(contacts.stakeholder) as stakeholder'),
                DB::raw('(floor(ivr_log_in.billsec/59)*59+if(mod(ivr_log_in.billsec,59)=0,0,59))/60 as duration')
            )
            ->groupBy('ivr_log_in.id');
        $responseData = $allRecord->get();

        return $responseData;
    }
}

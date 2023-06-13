<?php

namespace App\Helper;

use DB;

class SmsCampaignHelper
{

    private function getSmsTargetAudienceRecords($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom = $filterList['dateFrom'] ?? null;
        $dateTo = $filterList['dateTo'] ?? null;
        $gender = $filterList['gender'] ?? null;
        $stakeholder = $filterList['stakeholder'] ?? null;
        $grade = $filterList['grade'] ?? null;
        $area = $filterList['area'] ?? null;
        $district = $filterList['district'] ?? null;
        $division = $filterList['division'] ?? null;

        $gender = ($gender) ? strtoupper($gender) : null;
        $stakeholder = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade = ($grade) ? strtoupper($grade) : null;
        $area = ($area) ? strtoupper($area) : null;
        $district = ($district) ? strtoupper($district) : null;
        $division = ($division) ? strtoupper($division) : null;


        $smsCampaignIds = DB::table('sms_campaigns')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            })
            ->groupBy('id')
            ->pluck('id');

        $allRecord = DB::table('contacts')
            ->join('sms_campaign_logs', 'sms_campaign_logs.phone_number', 'contacts.phone_number')
            ->whereIn('sms_campaign_logs.campaign_id', $smsCampaignIds);

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

        $allRecord->select(DB::raw('UPPER(contacts.stakeholder) as stakeholder, UPPER(contacts.gender) as gender,UPPER(contacts.area) as area, UPPER(contacts.district) as district, UPPER(contacts.division) as division'), 'contacts.grade', 'contacts.phone_number as phone_number', 'sms_campaign_logs.campaign_id')
            ->groupBy('contacts.phone_number');

        $responseData = $allRecord->get();

        return $responseData;
    }

    private function getSmsCampaignsRecords($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $dateFrom = $filterList['dateFrom'] ?? null;
        $dateTo = $filterList['dateTo'] ?? null;
        $gender = $filterList['gender'] ?? null;
        $stakeholder = $filterList['stakeholder'] ?? null;
        $grade = $filterList['grade'] ?? null;
        $area = $filterList['area'] ?? null;
        $district = $filterList['district'] ?? null;
        $division = $filterList['division'] ?? null;

        $gender = ($gender) ? strtoupper($gender) : null;
        $stakeholder = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade = ($grade) ? strtoupper($grade) : null;
        $area = ($area) ? strtoupper($area) : null;
        $district = ($district) ? strtoupper($district) : null;
        $division = ($division) ? strtoupper($division) : null;


        $smsCampaignIds = DB::table('sms_campaigns')
            ->when($dateFrom, function ($query, $dateFrom) {
                $query->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m-%d')"), '>=', $dateFrom);
            })
            ->when($dateTo, function ($query, $dateTo) {
                $query->where(DB::raw("DATE_FORMAT(sms_campaigns.start_at, '%Y-%m-%d')"), '<=', $dateTo);
            })
            ->groupBy('id')
            ->pluck('id');

        $allRecord = DB::table('contacts')
            ->join('sms_campaign_logs', 'sms_campaign_logs.phone_number', 'contacts.phone_number')
            ->whereIn('sms_campaign_logs.campaign_id', $smsCampaignIds);

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

        $allRecord->select(DB::raw('UPPER(contacts.stakeholder) as stakeholder, UPPER(contacts.gender) as gender,UPPER(contacts.area) as area, UPPER(contacts.district) as district, UPPER(contacts.division) as division, DATE_FORMAT(sms_campaign_logs.created_at, "%Y-%m-%d") as created_at'), 'contacts.grade', 'contacts.phone_number as phone_number', 'contacts.name', 'contacts.occupation', 'sms_campaign_logs.status', 'sms_campaign_logs.campaign_id')
            ->groupBy('sms_campaign_logs.id');

        $responseData = $allRecord->get();

        return $responseData;
    }


    private function getSmsCampaignsRecordsById($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null], $id)
    {
        $dateFrom = $filterList['dateFrom'] ?? null;
        $dateTo = $filterList['dateTo'] ?? null;
        $gender = $filterList['gender'] ?? null;
        $stakeholder = $filterList['stakeholder'] ?? null;
        $grade = $filterList['grade'] ?? null;
        $area = $filterList['area'] ?? null;
        $district = $filterList['district'] ?? null;
        $division = $filterList['division'] ?? null;

        $gender = ($gender) ? strtoupper($gender) : null;
        $stakeholder = ($stakeholder) ? strtoupper($stakeholder) : null;
        $grade = ($grade) ? strtoupper($grade) : null;
        $area = ($area) ? strtoupper($area) : null;
        $district = ($district) ? strtoupper($district) : null;
        $division = ($division) ? strtoupper($division) : null;




        $allRecord = DB::table('contacts')
            ->join('sms_campaign_logs', 'sms_campaign_logs.phone_number', 'contacts.phone_number')
            ->where('sms_campaign_logs.campaign_id', $id);

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

        $allRecord->select(DB::raw('UPPER(contacts.stakeholder) as stakeholder, UPPER(contacts.gender) as gender,UPPER(contacts.area) as area, UPPER(contacts.district) as district, UPPER(contacts.division) as division, DATE_FORMAT(sms_campaign_logs.created_at, "%Y-%m-%d") as created_at'), 'contacts.grade', 'contacts.phone_number as phone_number', 'contacts.name', 'contacts.occupation', 'sms_campaign_logs.status', 'sms_campaign_logs.campaign_id')
            ->groupBy('sms_campaign_logs.id');

        $responseData = $allRecord->get();

        return $responseData;
    }

    // This function returns all targeted audiences
    // Based on all categories
    public function smsTotalTargetAudience($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $allRecord = $this->getSmsTargetAudienceRecords($filterList);
        return $allRecord;
    }

    // This function returns all targeted audiences
    // Based on area wise
    public function smsTargetAudienceAreaWise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
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
            $allRecord = $this->getSmsTargetAudienceRecords($filterList);

            foreach ($areaList as $key => $area) {
                $data[($area) ? $area : 'Unspecified'] = $allRecord->where('area', strtoupper($area))->count();
            }

        }

        return $data;
    }

    public function smsTargetAudienceCampaignWise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null], $campaignList = [])
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
        if ($campaignList) {
            $allRecord = $this->getSmsTargetAudienceRecords($filterList);

            foreach ($campaignList as  $area) {
                $data[($area) ? $area : 'Unspecified'] = $allRecord->where('campaign_id', $area)->count();
            }

        }

        return $data;
    }

    // This function returns all sms campaigns details
    // Based on all categories
    public function smsCampaignsData($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {
        $allRecord = $this->getSmsCampaignsRecords($filterList);
        return $allRecord;
    }

    public function smsCampaignsDataById($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null], $id)
    {
        $allRecord = $this->getSmsCampaignsRecordsById($filterList, $id);
        return $allRecord;
    }

    // This function returns sms campaigns details
    // Based on area wise
    public function smsCampaignsDataAreaWise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
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
            $allRecord = $this->getSmsCampaignsRecords($filterList);

            foreach ($areaList as $key => $area) {
                $data[($area) ? $area : 'Unspecified']['total_sent'] = $allRecord->where('area', strtoupper($area))->count();
                $data[($area) ? $area : 'Unspecified']['total_success'] = $allRecord->where('area', strtoupper($area))->where('status', 'Success')->count();
                $data[($area) ? $area : 'Unspecified']['total_failed'] = $allRecord->where('area', strtoupper($area))->where('status', 'Failed')->count();
            }

        }

        return $data;
    }

    public function smsCampaignsDataCampaignWise($filterList = ['dateFrom' => null, 'dateTo' => null, 'gender' => null, 'grade' => null, 'stakeholder' => null, 'area' => null, 'district' => null, 'division' => null])
    {

        $data = [];

        $allRecord = $this->getSmsCampaignsRecords($filterList);
        $campaignsId = $allRecord->groupBy("campaign_id")->toArray();

        $campaignsId = array_keys($campaignsId); //camp id
        sort($campaignsId);

        foreach ($campaignsId as $key => $area) {
            $data[($area) ? $area : 'Unspecified']['total_sent'] = $allRecord->where('campaign_id', strtoupper($area))->count();
            $data[($area) ? $area : 'Unspecified']['total_success'] = $allRecord->where('campaign_id', strtoupper($area))->where('status', 'Success')->count();
            $data[($area) ? $area : 'Unspecified']['total_failed'] = $allRecord->where('campaign_id', strtoupper($area))->where('status', 'Failed')->count();
        }


        return $data;
    }
}

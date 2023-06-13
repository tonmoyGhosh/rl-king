<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IvrSteps;
use App\Models\IvrClipPlayLog;
use Illuminate\Support\Facades\DB;

class DownloadClipFileController extends Controller
{
    public function downloadClipFile()
    {   
        if($_GET['p'] && isset($_GET['p']) && $_GET['c'] && isset($_GET['c']))
        {   
            $parent_key_press = $_GET['p'];
            $parentStep = IvrSteps::where('key_press', $parent_key_press)
                                    ->where('level', 1)
                                    ->where('parent_id', '=', null)->first();

            $child_key_press = $_GET['c'];
            if($parentStep)
            {
                $childStep = IvrSteps::where('key_press', $child_key_press)
                                    ->where('parent_id', '=', $parentStep->id)
                                    ->first();

                if($childStep && isset($childStep))
                {   
                    $playDate = date('Y-m-d');
                    $existClipPlayLog = IvrClipPlayLog::where('play_date', $playDate)
                                        ->where('ivr_step_id', $childStep->id)
                                        ->where('key_press_1', $parent_key_press)
                                        ->where('key_press_2', $child_key_press)
                                        ->first();

                
                    if($existClipPlayLog && isset($existClipPlayLog))
                    {
                        $existClipPlayLog->total_play_count = $existClipPlayLog->total_play_count + 1;
                        $existClipPlayLog->update();
                    }
                    else
                    {
                        $ivrClipPlayLog                         = new IvrClipPlayLog();
                        $ivrClipPlayLog->ivr_step_id	        = $childStep->id;
                        $ivrClipPlayLog->play_date	            = $playDate;
                        $ivrClipPlayLog->total_play_count	    = 1;
                        $ivrClipPlayLog->key_press_1	        = $parent_key_press;
                        $ivrClipPlayLog->key_press_2            = $child_key_press;
                        $ivrClipPlayLog->save();
                    }

                    $path = $childStep->clip_url;
    
                    if($path && isset($path))
                    {
                        return view('backend.downloadClipFile', compact('path'));
                    }
                }
            }
        }
    }
}

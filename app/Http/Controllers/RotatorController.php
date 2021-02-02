<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RotatorController extends Controller
{
    public function index()
    {
        $urls = Project::all();
        $hits_counter = 1;

        foreach ($urls as $url) {
            $cycle_hits = $url->ch;
            $hits_recived = $url->hr;
            $hits_counter = $url->hc;

            if ($cycle_hits > $hits_counter) {
                $hits_counter += 1;
                if ($url->hw != 0 && $url->hw > $hits_recived) {
                    $hits_recived += 1;
                    DB::table("urls")->where("link", $url->link)->update(["hr" => $hits_recived]);
                    DB::table("urls")->where("link", $url->link)->update(["hc" => $hits_counter]);
                    return Redirect::to($url->link);
                } else if ($url->hw != 0 && $url->hw > $hits_recived) {
                    $hits_recived += 1;
                    DB::table("urls")->where("link", $url->link)->update(["hr" => $hits_recived]);
                    DB::table("urls")->where("link", $url->link)->update(["hc" => $hits_counter]);
                    return Redirect::to($url->link);
                }
            }
        }
        Project::query()->update(['hc' => 0]);
        return $this->index();
    }
}

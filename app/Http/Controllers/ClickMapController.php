<?php

namespace App\Http\Controllers;

use App\Models\ClickMap;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;

class ClickMapController extends Controller
{

    public function clickCheck(Request $request)
    {
        // return $request->get('x');

        if ((!$request->get('x')) || (!$request->get('y')) || (!$request->get('code')) || (!$request->headers->get('referer'))) {
            return 0;
        }
        $referer = $request->headers->get('referer');
        $domain = parse_url($request->headers->get('referer'))['host'];

        $project = Project::find($request->get('code'));

        if ((!$project) || $project->domain != $domain)
            return 3;

        $page =  Page::where('url', $referer)->first();
        if (!$page) {
            $page = new Page();
            $page->project_id = $project->id;
            $page->url = $referer;
            $page->save();
        }

        $click = new ClickMap();
        $click->page_id = $page->id;
        $click->x = intval($request->get('x'));
        $click->y = intval($request->get('y'));
        $click->save();


        return 1;
    }
}

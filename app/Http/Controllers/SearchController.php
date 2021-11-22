<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $req){
        $data= Service::select('name')->where("name","LIKE","%{$req->input('query')}%")->get();
        return response()->json($data);
    }
    public function searchService(Request $req)
    {
        $service_slu=Str::slug($req->q,'-');
        if($service_slu)
        {
            return redirect('/service/'.$service_slu);
        }
        else
        {
            return back();
        }
    }
}

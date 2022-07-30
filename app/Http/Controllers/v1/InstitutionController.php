<?php

namespace App\Http\Controllers\v1;

use Throwable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class InstitutionController extends Controller
{
    public function listAllInstitutions(Request $request)
    {
        $base_url = config('services.elucidate.base_url'). '/institutions';
        try{
            $response =  Http::withToken($request->bearerToken())->get($base_url);
            if($response->successful())
                return response()->json([
                    'status' => $response->statusCode,
                    'data' => $response->data
                ]);
            
        }catch(Throwable $e){
            report($e);
        }
    }


    public function searchInstitution(Request $request)
    {
        $request->validate([
            'fullSearch' => 'required|string'
        ]);

        try{
            $base_url = config('elucidate.base_url'). '/institutions?fullSearch='. $request->fullSearch;
            $response =  Http::withToken($request->bearerToken())
                        ->accept('application/json')
                        ->get($base_url);
            if($response->successful()){
                return response()->json([
                    'status' => 200,
                    'data' => $response->data
                ]);
            }else if(optional($response)->statusCode == 404){
                $base_url = config('elucidate.base_url').'/tickets';
                $response =  Http::withToken($request->bearerToken())
                        ->accept('application/json')
                        ->post([
                            'project' => 'Project '. rand(),
                            'title' => $request->fullSearch . ' missing institution',
                            'description' => 'add institution '. $request->fullSearch,
                            'createdAt' => Carbon::now()->toDateTimeString(),
                            'updatedAt' => Carbon::now()->toDateTimeString()
                        ]);
            }
        }catch (Throwable $e){
            report($e);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Helpers\LogHelper;
use App\Jobs\ProcessConvert;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class QueueController extends Controller
{
    private $convert;

    private $log;

    public function __construct(LogHelper $log)
    {
        $this->log = $log;
        $route_name = Route::current()->getName();
        $this->log->log("Start : ".$route_name);
    }
    
    public function set(Request $request): JsonResponse
    {
        ProcessConvert::dispatch($request);
        return response()->json(['OK']);
    }
}

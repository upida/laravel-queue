<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessConvert;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Services\ConvertService;

class QueueController extends Controller
{
    private ConvertService $convert;

    private ProcessConvert $job;

    public function __construct(ConvertService $convert)
    {
        $this->convert = $convert;
    }
    
    public function set(Request $request)
    {
        return $this->job->handle($this->convert, $request);
    }
}

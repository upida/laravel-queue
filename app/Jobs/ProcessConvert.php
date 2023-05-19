<?php

namespace App\Jobs;

use App\Http\Helpers\LogHelper;
use App\Services\ConvertService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessConvert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $log;
    private $request;

    /**
     * Create a new job instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request->all();
        $this->log = new LogHelper;
        $this->log->log("Job Start : ProcessConvert");
    }
    
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $request = $this->request;
        $this->log->log("Job Handle : ProcessConvert".json_encode($request));
        
        (new ConvertService)->store($request);
    }
}

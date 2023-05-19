<?php

namespace App\Services;
use App\Http\Helpers\LogHelper;
use Symfony\Component\HttpFoundation\JsonResponse;
 
class ConvertService {

    private $log;

    public function __construct()
    {
        $this->log = new LogHelper;
        $this->log->log("Service Start : Convert");
    }
 
    public function store(array $data)
    {   
        $this->log->log("Service Convert Store : start");
        sleep(10);
        $this->log->log("Service Convert Store : DONE ".json_encode($data));
        // return response()->json($data);
    }
}
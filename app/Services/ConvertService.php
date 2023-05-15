<?php

namespace App\Services;
use Symfony\Component\HttpFoundation\JsonResponse;
 
class ConvertService {
 
    public function store(array $data): JsonResponse
    {
        return response()->json($data);
    }
}
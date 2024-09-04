<?php 

namespace App\Traits;

trait ApiResponse{

    public function ok($message, $data = []){
        return $this->success($message, $data, 200);
    }
    public function success($message, $data, $status_code){
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status_code);
    }
    public function error($message, $status_code){
        return response()->json([
            'message' => $message,
        ], $status_code);
    }
}


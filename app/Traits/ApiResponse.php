<?php 

namespace App\Traits;

trait ApiResponse{
    
    public const UNAUTHORIZED = 401 ;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const BAD_REQUEST = 400;
    public const METHOD_NOT_ALLOWED = 405;
    public const REQUEST_TIMEOUT = 408;
    public const PAGE_EXPIRED = 419;
    public const UNPROCESSABLE_ENTITY = 422;

    // * SERVER ERROR
    public const SERVER_ERROR = 500;
    public const BAD_GATEWAY = 502;

    //  * SUCCESS
    public const OK = 200;
    public const CREATED = 201;
    public const NO_CONTENT = 204;


    public function ok($message, $data = []){
        return $this->success($message, $data, self::OK);
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


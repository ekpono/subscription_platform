<?php


namespace App\Helpers;


use Exception;
use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public static function goodResponse( $data=null, $code = 200, $message="Request Successful"): JsonResponse
    {
        return response()->json(['status'=>true, 'code'=>$code,'message' => $message,'data'=> $data], $code,[],JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public static function badResponse($data=null, $code = 400, $message="Error"): JsonResponse
    {
        return response()->json(['status'=>false, 'code'=>$code,'message' => $message,'data'=> $data], $code);
    }

    /**
     * @param Exception $e
     * @return JsonResponse
     */
    public static function handleException(Exception $e): JsonResponse
    {
        return self::badResponse($e, $e->getCode(), $e->getMessage());
    }
}

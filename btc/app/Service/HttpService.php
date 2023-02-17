<?php


namespace App\Service;

/**
 * 接口统一返回封装
 * Class HttpService
 * @package App\Service
 */
class HttpService
{
    /**
     * 返回的数据
     * @var
     */
    public $data;

    /**
     * 错误码
     * @var
     */
    public $code;

    /**
     * 错误消息
     * @var
     */
    public $message;

    public static $sign = null;

    /**
     * 响应
     */
    public function Response(): \Illuminate\Http\JsonResponse
    {
        return response()->json(json_decode(json_encode($this),1));
    }


    /**
     * @return HttpService|null
     */
    public static function getInterface(): ?HttpService
    {
        if(is_null(self::$sign)){
            self::$sign = new self();
        }
        return self::$sign;
    }

    /**
     * 成功响应
     * @param array $data
     * @param int $code
     * @param string $message
     * @return HttpService|null
     */
    public static function setSuccess( $data=[], int $code=0, string $message='成功'): ?HttpService
    {
        if(is_object($data)){
            $data = json_decode(json_encode($data),1);
        }
        $sign = self::getInterface();
        $sign->data = $data;
        $sign->message = $message;
        $sign->code = $code;
        return $sign;
    }

    /**
     * 成功响应
     * @param array $data
     * @param int $code
     * @param string $message
     * @return HttpService|null
     */
    public static function setFailed( string $message='失败',$data=[],  int $code=500): ?HttpService
    {
        $sign = self::getInterface();
        $sign->data = $data;
        $sign->message = $message;
        $sign->code = $code;
        return $sign;
    }
}

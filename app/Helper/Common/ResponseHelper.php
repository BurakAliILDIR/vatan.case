<?php

namespace App\Helper\Common;

class ResponseHelper
{
    static function json_response( string $type, string $message, $data )
    {
        return response()->json([
            'type'    => $type, // app/Enum/Common/ResponseTypeEnum.php
            'message' => $message,
            'data'    => $data,
        ]);
    }
}

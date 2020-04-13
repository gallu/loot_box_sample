<?php

namespace App\Libs;

class UuidUtil
{
    //
    public static function isValid($uuid)
    {
        $r = preg_match('/\A[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[0-5][a-fA-F0-9]{3}-[089aAbB][a-fA-F0-9]{3}-[a-fA-F0-9]{12}\z/', $uuid);
        //
        if (1 === $r) {
            return true;
        }
        // else
        return false;
    }

}

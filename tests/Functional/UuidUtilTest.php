<?php

namespace Tests\Functional;

class UuidUtilTest extends \PHPUnit\Framework\TestCase
{
    /**
     */
    public function testUuidOk()
    {
        $data = [
            '1b7b4b5c-ad70-45d1-85f9-f0c8aeb41766',
            '3a4e7204-ca85-4daa-ac3f-644b80050181',
            '1ed09b01-8dec-43ea-8d0c-fe5422df0241',
            '1ED09B01-8DEC-43EA-8D0C-FE5422DF0241',
        ];
        //
        foreach($data as $s) {
            $this->assertSame(\App\Libs\UuidUtil::isValid($s), true);
        }
    }

    /**
     */
   public function testUuidNg()
    {
        $data = [
            '1b7b4b5c-ad7045d1-85f9-f0c8aeb41766',
            '3a4e7204-ca85-4daa-ac3f-644b80050181 ',
            'zed09b01-8dec-43ea-8d0c-fe5422df0241',
            '',
        ];
        //
        foreach($data as $s) {
            $this->assertSame(\App\Libs\UuidUtil::isValid($s), false);
        }
    }


}

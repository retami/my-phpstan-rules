<?php

declare(strict_types=1);

namespace tests\MyPHPStanRules\data;

use DateTime;

class Foo
{
    public static function returnUnionTypeWithFalse() : int|false
    {
        return 0;
    }

    public function returnUnionTypeNullFalse() : null|false
    {
        return null;
    }

    public function returnObjectOrFalse() : DateTime|false
    {
        return false;
    }

    public function returnUnionTypeWithoutFalse() : int|string
    {
        return 0;
    }

    public function returnOnlyFalse() : false
    {
        return false;
    }
}

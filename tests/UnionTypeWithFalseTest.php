<?php

declare(strict_types=1);

namespace tests\MyPHPStanRules;

use MyPHPStanRules\UnionTypeWithFalseRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<UnionTypeWithFalseRule>
 */
class UnionTypeWithFalseTest extends RuleTestCase
{
    const MESSAGE = 'Return type is a union type with false.';

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/Foo.php'], [
            [self::MESSAGE, 11],
            [self::MESSAGE, 16],
            [self::MESSAGE, 21]
        ]);
    }


    /**
     * @return UnionTypeWithFalseRule
     */
    protected function getRule(): Rule
    {
        return new UnionTypeWithFalseRule();
    }
}

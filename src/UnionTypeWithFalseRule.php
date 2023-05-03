<?php

declare(strict_types=1);

namespace MyPHPStanRules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node\Stmt\ClassMethod>
 */
class UnionTypeWithFalseRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\ClassMethod::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        /** @var Node\Stmt\ClassMethod $node */
        $returnType = $node->getReturnType();

        if (! $returnType instanceof Node\UnionType) {
            return [];
        }

        $types = $returnType->types;
        foreach ($types as $type) {
            if ($type instanceof Node\Identifier && strtolower($type->name) === 'false') {
                return [ RuleErrorBuilder::message('Return type is a union type with false.')->build() ];
            }
        }

        return [];
    }
}

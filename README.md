## Custom rule for PHPStan

#### **UnionTypeWithFalseRule:** 

Do not allow ```false``` in a union type used as return value.

This rule detects method declarations like

```
public function returnUnionTypeWithFalse() : int|false { ... }
```

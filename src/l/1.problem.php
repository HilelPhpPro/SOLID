<?php

abstract class AA
{
    /**
     * @param int $a
     * @param int $b
     * @return bool
     */
    public function method1(int $a, int $b): bool
    {
        try {
            $this->validate($a);
            $res = $a != $b;
        } catch (\Exception) {
            $res = false;
        }
        return $res;
    }

    abstract protected function validate(int $a): bool;
}
class A extends AA
{

    protected function validate(int $a): bool
    {
        return true;
    }
}

class A1 extends A
{
    protected function validate(int $a): bool
    {
        if ($a < 0) {
            throw new \Exception('$a < 0');
        }
        return true;
    }
}

function userCases (A $a) {
    var_dump($a->method1(-1, -1));
}



userCases(new A());
userCases(new A1());
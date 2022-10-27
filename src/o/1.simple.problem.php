<?php

namespace Simple0;

abstract class AbstractEntity
{
    // .........
}

class A extends AbstractEntity
{
    // .........
}

class B extends AbstractEntity
{
    // .........
}

class C extends AbstractEntity
{
    // .........
}


class Repository
{
    // .........

    public function save(AbstractEntity $entity)
    {

        // logic for save any entity
        if (get_class($entity) === A::class) {
            // custom logic
        } elseif (get_class($entity) === B::class) {
            // custom logic
        } else {
            // base logic
        }
    }

    // .........
}

$repository = new Repository();

$a = new A();
$b = new B();
$c = new C();

$repository->save($a);
$repository->save($b);
$repository->save($c);
















namespace Simple1;

abstract class AbstractEntity
{
    // .........
}

class AccountEntity extends AbstractEntity
{
    // .........
}

class RoleEntity extends AbstractEntity
{
    // .........
}


class Repository
{
    // .........

    public function save(AbstractEntity $entity)
    {
        if ($entity instanceof AccountEntity) {

            // custom logic for save AccountEntity

        } elseif ($entity instanceof RoleEntity) {

            // custom logic for save RoleEntity

        } else {

            // logic for save any entity

        }
    }

    // .........
}

$repository = new Repository();

$account = new AccountEntity();
$role = new RoleEntity();

$repository->save($account);
$repository->save($role);

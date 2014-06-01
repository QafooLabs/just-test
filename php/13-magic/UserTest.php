<?php

require_once __DIR__  . '/AttributeAccessBaseTest.php';
require_once __DIR__  . '/User.php';

class UserTest extends AttributeAccessBaseTest
{
    public function getSubjectOfTest()
    {
        return new User();
    }
}

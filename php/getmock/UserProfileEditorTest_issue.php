<?php

class UserProfileEditorTest extends \PHPUnit_Framework_TestCase
{
    public function testUserCanEditOwnProfile()
    {
        $permissionResolverMock = $this->getMock(
            'PermissionResolver',
            array(), // $methods
            array(), // $arguments
            '', // $mockClassName
            false // $callOriginalConstructor
        );
    }
}

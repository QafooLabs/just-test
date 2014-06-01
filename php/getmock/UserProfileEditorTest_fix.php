<?php

class UserProfileEditorTest extends \PHPUnit_Framework_TestCase
{
    public function testUserCanEditOwnProfile()
    {
        $permissionResolverMock = $this->getMockBuilder('PermissionResolver')
            ->disableOriginalConstructor()
            ->getMock();
    }
}

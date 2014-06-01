<?php

require_once __DIR__ . '/PermissionResolver.php';

class PermissionResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testReadPermissionDenied()
    {
        $accessRepositoryMock = $this->getMockBuilder('AccessRightRepository')
            ->getMock();

        $accessRepositoryMock->expects($this->any())
            ->method('loadRights')
            ->will($this->returnValue(array()));

        $resolver = new PermissionResolver($accessRepositoryMock);

        $this->assertFalse(
            $resolver->mayRead(
                new User('john.doe@example.com'),
                '/foo/bar'
            )
        );
    }

    public function testReadPermissionGranted()
    {
        $accessRepositoryMock = $this->getMockBuilder('AccessRightRepository')
            ->getMock();

        $accessRepositoryMock->expects($this->any())
            ->method('loadRights')
            ->will(
                $this->returnValue(
                    array(
                        'john.doe@example.com' => PermissionResolver::PERMISSION_READ,
                    )
                )
            );

        $resolver = new PermissionResolver($accessRepositoryMock);

        $this->assertTrue(
            $resolver->mayRead(
                new User('john.doe@example.com'),
                '/foo/bar'
            )
        );
    }
}

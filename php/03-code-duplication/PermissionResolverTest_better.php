<?php

class PermissionResolverTest extends \PHPUnit_Framework_TestCase
{
    private $resolver;

    private $accessRepositoryMock;

    public function setUp()
    {
        $this->accessRepositoryMock = $this->getMockBuilder('AccessRightRepository')
            ->getMock();

        $this->resolver = new PermissionResolver(
            $this->accessRepositoryMock
        );
    }
    public function testReadPermissionDenied()
    {
        $this->accessRepositoryMock->expects($this->any())
            ->method('loadRights')
            ->will($this->returnValue(array()));

        $this->assertFalse(
            $this->resolver->mayRead(
                new User('john.doe@example.com'),
                '/foo/bar'
            )
        );
    }

    public function testReadPermissionGranted()
    {
        $this->accessRepositoryMock->expects($this->any())
            ->method('loadRights')
            ->will(
                $this->returnValue(
                    array(
                        'john.doe@example.com' => PermissionResolver::PERMISSION_READ,
                    )
                )
            );

        $this->assertTrue(
            $this->resolver->mayRead(
                new User('john.doe@example.com'),
                '/foo/bar'
            )
        );
    }
}

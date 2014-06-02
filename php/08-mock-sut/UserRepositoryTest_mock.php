<?php

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadUser()
    {
        $userRepository = $this->getMockBuilder('UserRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('query'))
            ->getMock();

        $userRepository->expects($this->any())
            ->method('query')
            ->willReturn(
                array('u_id' => 23, 'u_name' => 'John Doe', 'u_email' => '...')
            );

        $this->assertEquals(
            new User(23, 'John Doe', '...'),
            $userRepository->loadUser(23)
        );
    }
}

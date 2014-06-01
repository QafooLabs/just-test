<?php

class UserProfileControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testDisplayProfileNonRelated()
    {
        $userRepositoryMock = $this->getMockBuilder('UserRepository')
            ->getMock();

        $relationshipResolverMock = $this->getMockBuilder('RelationshipResolver')
            ->getMock();

        $profileUser = new User(23);
        $viewingUser = new User(42);

        $userRepositoryMock->expects($this->at(0))
            ->method('loadUser')
            ->with($this->equalTo(23))
            ->will($this->returnValue($profileUser));

        $userRepositoryMock->expects($this->at(1))
            ->method('loadUser')
            ->with($this->equalTo(42))
            ->will($this->returnValue($viewingUser));

        $relationshipResolverMock->expects($this->once())
            ->method('areCloseConnected')
            ->with(
                $this->identicalTo($profileUser),
                $this->identicalTo($viewingUser)
            )->will($this->returnValue(true));

        // ...

        $userProfileController = new UserProfileController(
            $userRepositoryMock,
            $relationshipResolverMock
        );

        // ...
    }
}

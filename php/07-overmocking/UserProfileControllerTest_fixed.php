<?php

class UserProfileControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testDisplayProfileNonRelated()
    {
        $userRepositoryStub = $this->getMockBuilder('UserRepository')
            ->getMock();

        $relationshipResolverStub = $this->getMockBuilder('RelationshipResolver')
            ->getMock();

        $profileUser = new User(23);
        $viewingUser = new User(42);

        $userRepositoryStub->expects($this->at(0))
            ->method('loadUser')
            ->will($this->onConsecutiveCalls($profileUser, $viewingUser));

        $relationshipResolverStub->expects($this->once())
            ->method('areCloseConnected')
            ->will($this->returnValue(true));

        // ...

        $userProfileController = new UserProfileController(
            $userRepositoryStub,
            $relationshipResolverStub
        );

        // ...
    }
}

<?php

class UserProfileController
{
    private $userRepository;

    private $relationshipResolver;

    public function __construct(
        UserRepository $userRepository,
        RelationshipResolver $relationshipResolver
    ) {
        $this->userRepository = $userRepository;
        $this->relationshipResolver = $relationshipResolver;
    }

    public function displayProfile($profileUserId, $viewingUserId)
    {
        $profileUser = $this->userRepository->loadUser($profileUserId);
        $viewingUser = $this->userRepository->loadUser($viewingUserId);

        $closeConnected = $this->relationshipResolver->areCloseConnected(
            $profileUserId,
            $viewingUserId
        );

        // ...
    }
}

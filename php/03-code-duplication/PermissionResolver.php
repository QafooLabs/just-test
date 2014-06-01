<?php

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/AccessRightRepository.php';

class PermissionResolver
{
    const PERMISSION_READ = 1;

    const PERMISSION_WRITE = 2;

    private $accessRightRepository;

    public function __construct(AccessRightRepository $accessRightRepository)
    {
        $this->accessRightRepository = $accessRightRepository;
    }

    public function mayRead(User $user, $resource)
    {
        foreach ($this->accessRightRepository->loadRights($resource) as $permissionUser => $accessPermission) {
            if ($permissionUser == $user->id && $accessPermission == self::PERMISSION_READ) {
                return true;
            }
        }
        return false;
    }
}

<?php

class UserRepository
{
    private $dbConnection;

    public function __construct(Database $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function loadUser($userId)
    {
        $rows = $this->dbConnection->query(
            'SELECT * FROM user WHERE u_id = :u_id',
            array(
                'u_id' => $userId
            )
        );
        return $this->mapUser($rows);
    }

    protected function mapUser(array $rows)
    {
        // ...
    }
}

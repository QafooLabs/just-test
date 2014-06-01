<?php

class UserRepository
{
    public function loadUser($userId)
    {
        $rows = $this->query(
            'SELECT * FROM user WHERE u_id = :u_id',
            array(
                'u_id' => $userId
            )
        );
        return $this->mapUser($rows);
    }

    protected function query($sql, array $params)
    {
        // ... execute query ...
    }

    protected function mapUser(array $rows)
    {
        // ...
    }
}

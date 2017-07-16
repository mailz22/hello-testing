<?php

namespace Helper;

use Codeception\Exception\ContentNotFound;
use Model\UserModel;
use Symfony\Component\Yaml\Yaml;

class ProtectedUserRepo extends \Codeception\Module
{
    /** @var null|array|UserModel[] */
    private $usersCache = null;

    /**
     * @param array $roles
     * @return \Model\UserModel
     */
    public function getRandUserByRoles(array $roles = [])
    {
        if (null == $this->usersCache) {
            $this->loadFromConfig();
        }
        $filtered = [];
        if (count($roles) != 0) {
            foreach ($this->usersCache as $user) {
                $intersection = array_intersect($user->getRoles(), $roles);
                if (count($intersection) > 0) {
                    $filtered[] = $user;
                }
            }
        } else {
            $filtered = $this->usersCache;
        }

        return $filtered[rand(0, count($filtered) - 1)];
    }

    private function loadFromConfig()
    {
        $fileName = __DIR__ . '/../../_data/users.yml';
        if (!file_exists($fileName)) {
            throw new ContentNotFound('File "' . $fileName . '" not found', 500);
        }
        $fp = fopen($fileName, 'r+');
        $result = '';
        while ($line = fgets($fp)) {
            $result .= $line;
        }
        $data = Yaml::parse($result, false, true);
        $usersData = $data['users'];
        $this->usersCache = [];
        foreach ($usersData as $row) {
            $this->usersCache[] = (new UserModel())
                ->setUsername($row['login'])
                ->setPassword($row['password'])
                ->setRoles($row['roles']);
        }
    }
}
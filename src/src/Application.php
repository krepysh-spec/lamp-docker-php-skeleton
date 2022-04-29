<?php

namespace KrepyshSpec\LampDockerPhpSkeleton;

use PDO;
use PDOException;
use Redis;
use RedisException;

class Application
{
    /**
     * @return void
     */
    public function start()
    {
        $databaseConnectionStatus = $this->checkConnectMysql();
        $redisConnectionStatus = $this->checkConnectRedis();

        require_once __DIR__ . '/views/index.php';
    }

    /**
     * @return bool
     */
    private function checkConnectMysql(): bool
    {
        $servername = "mysql";
        $username = "root";
        $password = "root";
        $dbname = "testwork";
        $port = "3306";

        try{

            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e){
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    private function checkConnectRedis(): bool
    {
        try {

            $redis = new Redis();
            $redis->connect('redis');

            if ($redis->ping()) {
                return true;
            }

        } catch (RedisException $e) {
            return false;
        }

        return false;
    }

}
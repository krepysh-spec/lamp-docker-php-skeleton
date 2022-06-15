<?php

declare(strict_types=1);

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
        $username   = $_ENV['MYSQL_USER'];
        $password   = $_ENV['MYSQL_PASSWORD'];
        $dbname     = $_ENV['MYSQL_DATABASE'];
        $port       = $_ENV['MYSQL_PORT'];

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
<?
define('BASEPATH', __DIR__.'/../');

require_once BASEPATH.'vendor/autoload.php';

use App\Model\Config;
use App\Model\User;
use App\Model\Database;

try {
    $config = new Config(BASEPATH.'.env');
    $db = new Database('db', 3306, $config->db['database'], $config->db['user'], $config->db['password'], 'utf8mb4');
    $userId = 1;
    $user = new User(...array_values($db->get('users', [$userId])[0]));
    echo $user->username;
} catch (\Exception $e) {
    \error_log($e->getMessage());
    exit($e->getMessage());
}

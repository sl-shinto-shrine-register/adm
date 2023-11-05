<?
define('BASEPATH', __DIR__.'/../');

require_once BASEPATH.'vendor/autoload.php';

use App\Model\Config;
use App\Model\User;

$config = new Config(BASEPATH.'.env');
echo var_dump($config->db);

$user = new User('Tester');
echo $user->username;

<?
//phpinfo();
require_once __DIR__.'/../vendor/autoload.php';

use App\Model\User;

$user = new User('Tester');
echo $user->username;

<?
namespace App\Model;

class User {
    public string $username;
    
    public function __construct(string $username) {
        $this->username = $username;
    }
}

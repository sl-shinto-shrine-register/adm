<?
namespace App\Model;

class Config {
    public $db = [
        'database' => '',
        'user' => '',
        'password' => ''
    ];

    public function __construct(string $file) {
        if (!\file_exists($file)) {
            die('Failed to load config.');
        }
        $parsedConfig = \parse_ini_file('/var/www/.env', false, \INI_SCANNER_TYPED);
        $this->db['database'] = $parsedConfig['DB_DATABASE'];
        $this->db['user'] = $parsedConfig['DB_USER'];
        $this->db['password'] = $parsedConfig['DB_PASSWORD'];
    }
}

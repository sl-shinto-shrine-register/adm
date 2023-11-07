<?
namespace App\Model;

class Database {
    const OPTIONS = [
        \PDO::ATTR_EMULATE_PREPARES   => false, // Disable emulation mode for "real" prepared statements
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, // Disable errors in the form of exceptions
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // Make the default fetch be an associative array
    ];

    private \PDO $connection;

    public function __construct(string $host, int $port, string $database, string $user, string $password, string $charset) {
        $dsn = 'mysql:host='.$host.';port='.$port.';dbname='.$database.';charset='.$charset;
        $this->connection = new \PDO($dsn, $user, $password, Database::OPTIONS);
    }

    public function query(string $sql) {
        $result = [];
        foreach ($this->connection->query($sql) as $row) {
            array_push($result, $row);
        }
        return $result;
    }

    public function get(string $table, array $ids) {
        $sql = 'SELECT * FROM '.$table.' WHERE id IN ('.implode(', ', $ids).')';
        return $this->query($sql);
    }

    public function execute(string $sql, $data) {
        $statement = $this->connection->prepare($sql);
        try {
            $this->connection->beginTransaction();
            foreach ($data as $row) {
                $statement->execute($row);
            }
            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

    public function insert(string $table, array $fields, array $data) {
        $sql = 'INSERT INTO '.$table.' ('.implode(', ', $fields).') VALUES (:'.implode(', :', $fields).')';
        $this->execute($sql, $data);
    }

    public function update(string $table, array $fields, array $data) {
        $sql = 'UPDATE '.$table.' SET '.implode('=?, ', $fields).'=? WHERE id=:id';
        $this->execute($sql, $data);
    }

    public function delete(string $table, array $ids) {
        $sql = 'DELETE FROM '.$table.' WHERE id=?';
        $this->execute($sql, $ids);
    }
}

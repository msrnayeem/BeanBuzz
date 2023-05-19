<?php
class dbConnect{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "employee";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        // Create a connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check the connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        // Return the connection object
        return $this->conn;
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    public function delete($table, $condition) {
        $sql = "DELETE FROM $table WHERE $condition";
        return $this->conn->query($sql);
    }

    public function update($table, $data, $condition) {
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "$column = '$value'";
        }
        $setClause = implode(', ', $set);
        $sql = "UPDATE $table SET $setClause WHERE $condition";
        return $this->conn->query($sql);
    }

    public function select($table, $columns = '*', $condition = '') {
        $sql = "SELECT $columns FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }
        return $this->conn->query($sql);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
}
?>
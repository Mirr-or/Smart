<?php
namespace Core\Database;

class QueryBuilder
{
    /** @var  mysqli */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert($table, array $data)
    {
        $keys = array_keys($data);
        // INSERT INTO %s (%s) VALUES ('%s')
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', $keys),
            ":" . implode("', :", $keys)
        );
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM $table";

        return $this->db->query($sql)->fetchAll();
    }

    public function update($table, array $data)
    {
        $sql = sprintf(
            "UPDATE %s SET complete = 1 WHERE id IN (%s)",
            $table,
            "'" . implode("', '", $data) . "'"
        );
        return $this->db->query($sql);
    }
    public function delete($table, array $data)
    {
        $sql = sprintf(
            "DELETE FROM %s WHERE id IN (%s)",
            $table,
            "'" . implode("', '", $data) . "'"
        );
        return $this->db->query($sql);
    }
}
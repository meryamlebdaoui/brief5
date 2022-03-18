<?php

class Connection
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "train";
	public $conn;

	public function __construct()
	{

		try {
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	public function getConnection()
	{
		return $this->conn;
	}

	public function insert($table, $tableCln, $tableVal)
	{
		$names = "";
		$values = "";
		$vrls = "";
		for ($i = 0; $i < count($tableCln); $i++) {
			if ($i > 0) {
				$vrls = ",";
			}
			$names .= $vrls . "`" . $tableCln[$i] . "`";
			$values .= $vrls . "'" . $tableVal[$i] . "'";
		}
		$str = "INSERT INTO `$table`(" . $names . ") VALUES (" . $values . ")";
		$query = $this->conn->prepare($str);
		$query->execute();
	}

	public function selectAll($table)
	{
		$query = $this->conn->prepare("SELECT * FROM `$table`");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectOne($table, $id)
	{
		$query = $this->conn->prepare("SELECT * FROM `$table` where id='$id'");
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function update($table, $tableCln, $tableVal, $id)
	{
		$names = "";
		$vrls = "";
		for ($i = 0; $i < count($tableCln); $i++) {
			if ($i > 0) {
				$vrls = ",";
			}
			$names .= $vrls . "`" . $tableCln[$i] . "`='" . $tableVal[$i] . "'";
		}
		$str = "UPDATE $table SET $names WHERE id=$id";
		$query = $this->conn->prepare($str);
		$query->execute();
	}

	public function delete($table, $id)
	{
		$query = $this->conn->prepare("DELETE FROM `$table` WHERE id=$id");
		$query->execute();
	}
}

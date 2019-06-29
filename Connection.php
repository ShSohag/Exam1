<?php 

class Connection{

	public $conn;

	public function __construct()
	{
		$this->conn = new PDO('mysql:host=localhost;dbname=wife','root','');
	}


	public function insertWife($shopping,$anniversery,$birthday,$salary,$relatives)
	{
		try
        {
			$statement = $this->conn->prepare("INSERT INTO task (shopping,anniversery,birthday,salary,relatives) VALUES (:shopping,:anniversery,:birthday,:salary,:relatives)");
					$statement->execute(
						array(
							':shopping' => $shopping,
							':anniversery' => $anniversery,
							':birthday' => $birthday,
							':salary' => $salary,
                            ':relatives' => $relatives
						)
					);
            
					echo "Inserted the data succesfully!.<br> ";
                    echo "Logged as sohag";
		}
        
        catch(\Exception $e)
        {
			echo "error: ".$e->getMessage();
		}
		
	}

	public function getAll($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
		return $statement->fetchAll();
	}


	public function update($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
	}


}


?>
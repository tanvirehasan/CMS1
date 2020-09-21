<?php 

class Article{
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM downlaod");
		$query->execute();

		return $query->fetchAll();
	}	

	public function fetch_data($artical_id){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM articales WHERE  artical_id=? ");
		$query->bindValue(1, $artical_id);
		$query->execute();

		return $query->fetch();
	}	

}


 ?>
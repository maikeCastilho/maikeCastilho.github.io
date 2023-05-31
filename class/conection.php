<?php
 //classe de conexao ao banco mysql
class ConnDb extends PDO
{
	//criando os atributos da conexao
	private $pdo;
	
	//Google - Europa
    private $db_ip = "127.0.0.1";
	private $db_name = "maike.dev";
	private $db_user = "root";
	private $db_pass = "123456";
		
	//criando o metodo para conexao automatica ao chamar a classe
	public function __construct()
	{
		$this->pdo = new PDO("mysql:host=$this->db_ip;dbname=$this->db_name", $this->db_user, $this->db_pass,[]);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	//criando o metodo de select
	public function select($query, $campos){
		$stmt = $this->pdo->prepare($query);
		//verificando se existem parametros para o bind no select
		if(count($campos) > 0){
			foreach ($campos as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
				// print_r( $stmt);
				// exit();
			}
		}
		$stmt->execute();
		$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $retorno;
		// print_r($stmt);
		// exit();
		
	}
	


	//criando o metodo insert
	public function insert($query, $campos){
		//parametros obrigatorios para insert
		if(count($campos) > 0){
			$stmt = $this->pdo->prepare($query);
			foreach ($campos as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
			}
			try {
				$stmt->execute();
				$insert = $this->select("SELECT LAST_INSERT_ID() AS id", []);
				if(count($insert) > 0){$id = $insert[0]['id'];}else{$id = 0;}
				return $id;
			} catch (Exception $e) {
				
				return false;
			}
		}else{
			return 0;
		}
	}

	//criando o update e delete
	public function update_delete($query, $campos){
		//parametros obrigatorios para delete
		if(count($campos) > 0){
			$stmt = $this->pdo->prepare($query);
			foreach ($campos as $key => $value) {
				$stmt->bindValue(':' . $key, $value);
			}
			$stmt->execute();
			return true;
		}else{
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
			return true;
		}
	}
}

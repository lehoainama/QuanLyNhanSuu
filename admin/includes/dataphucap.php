<?php  
class phucapo{

	//DB Stuff
	private $conn;
	private $table = "phucap";

	// Properties
	//public $n_nhanvien_id;
	public $Onha;
	public $AnUong;
	public $CaDem;
	public $DiLai;
	public $NgoaiNgu;
	
	
	


	//Constructor with DB
	public function __construct($db){
		$this->conn = $db;
	}

	//Read multi records
	public function read(){
		$sql = "SELECT * FROM $this->table";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	//Read one record
	public function read_single(){
		$sql = "SELECT * FROM $this->table WHERE Onha = :get_Onha";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_Onha',$this->Onha);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//Set Properties
		//$this->n_nhanvien_id = $row['Onha'];
		$this->Onha = $row['Onha'];
		$this->AnUong = $row['AnUong'];
		$this->CaDem = $row['CaDem'];
		$this->DiLai = $row['DiLai'];
		$this->NgoaiNgu = $row['NgoaiNgu'];
		
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET Onha = :Onha,
		          	  AnUong = :AnUong,
		          	  CaDem = :CaDem,
					  DiLai = :DiLai,
					  NgoaiNgu = :NgoaiNgu";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->Onha = htmlspecialchars(strip_tags($this->Onha));
		$this->AnUong = htmlspecialchars(strip_tags($this->AnUong));
		$this->CaDem = htmlspecialchars(strip_tags($this->CaDem));
		$this->DiLai = htmlspecialchars(strip_tags($this->DiLai));
		$this->NgoaiNgu = htmlspecialchars(strip_tags($this->NgoaiNgu));
		
		
		//Bind data
		$stmt->bindParam(':Onha',$this->Onha);
		$stmt->bindParam(':AnUong',$this->AnUong);
		$stmt->bindParam(':CaDem',$this->CaDem);
		$stmt->bindParam(':DiLai',$this->DiLai);
		$stmt->bindParam(':NgoaiNgu',$this->NgoaiNgu);
		



		//Execute query
		if($stmt->execute()){
			return true;
		}
		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;
	}

	
public function update(){
	//Create query
	$query = "UPDATE $this->table
			  SET 
					AnUong = :AnUong,
					CaDem = :CaDem,
					DiLai = :DiLai,
					NgoaiNgu = :NgoaiNgu
		
			  WHERE 
					Onha = :get_Onha";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->Onha = htmlspecialchars(strip_tags($this->Onha));
	$this->AnUong = htmlspecialchars(strip_tags($this->AnUong));
	$this->CaDem = htmlspecialchars(strip_tags($this->CaDem));
	$this->DiLai = htmlspecialchars(strip_tags($this->DiLai));
	$this->NgoaiNgu = htmlspecialchars(strip_tags($this->NgoaiNgu));
	
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->Onha);
	$stmt->bindParam(':get_Onha',$this->Onha);
	$stmt->bindParam(':AnUong',$this->AnUong);
	$stmt->bindParam(':CaDem',$this->CaDem);
	$stmt->bindParam(':DiLai',$this->DiLai);
	$stmt->bindParam(':NgoaiNgu',$this->NgoaiNgu);
	
	
	//Execute query
	if($stmt->execute()){
		return true;
	}
	//Print error if something goes wrong
	printf("Error: %s. \n", $stmt->error);
	return false;
}

	//Delete employee
	public function delete(){

		//Create query
		$query = "DELETE FROM $this->table
		          WHERE Onha = :get_Onha";
		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->Onha= htmlspecialchars(strip_tags($this->Onha));

		//Bind data
		$stmt->bindParam(':get_Onha',$this->Onha);

		//Execute query
		if($stmt->execute()){
			return true;
		}

		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;

	}
	// public function readOnha()
	// {
	// 	$sql = " Select Onha FROM CaDem ORDER BY Onha desc limit 1";
	// 	$stmt = $this->conn->prepare($sql);
	// 	$stmt->execute();
	// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
	// 	if($row){
	// 		$lastOnha  = $row['Onha'];
	// 	}
	// 	else
	// 	{
	// 	 	$lastOnha ='';
	// 	}
	// 	if($lastOnha =="")
	// 	{
	// 		$Onhaid="PC000001";
	// 	}
	// 	else
	// 	{
	// 		$Onhaid=substr($lastOnha,2);
	// 		$Onhaid=intval($Onhaid);
	// 		$Onhaid="CV". str_pad($Onhaid +1,6,"0",STR_PAD_LEFT);
				
	// // 	}
	// 	return $Onhaid;
	// }
}
?>


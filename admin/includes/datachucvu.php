<?php  
class chucvuo{

	//DB Stuff
	private $conn;
	private $table = "chucvu";

	// Properties
	//public $n_nhanvien_id;
	public $MaCV;
	public $TenCV;
	public $PhuCap;
	
	
	


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
		$sql = "SELECT * FROM $this->table WHERE MaCV = :get_MaCV";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_MaCV',$this->MaCV);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//Set Properties
		//$this->n_nhanvien_id = $row['MaCV'];
		$this->MaCV = $row['MaCV'];
		$this->TenCV = $row['TenCV'];
		$this->PhuCap = $row['PhuCap'];
		
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaCV = :MaCV,
		          	  TenCV = :TenCV,
		          	  PhuCap = :PhuCap";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
		$this->TenCV = htmlspecialchars(strip_tags($this->TenCV));
		$this->PhuCap = htmlspecialchars(strip_tags($this->PhuCap));
		
		
		



		//Bind data
		$stmt->bindParam(':MaCV',$this->MaCV);
		$stmt->bindParam(':TenCV',$this->TenCV);
		$stmt->bindParam(':PhuCap',$this->PhuCap);
		



		//Execute query
		if($stmt->execute()){
			return true;
		}
		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;
	}

	//Update employee
// 	public function update(){
// 		//Create query
// 		$query = "UPDATE $this->table
// 		          SET 
// 					TenCV = :TenCV,
// 					PhuCap = :PhuCap,
// 				  DienGiai = :DienGiai
				 
// 			  WHERE 
// 					MaCV = :get_MaCV";
// 		//Prepare statement
// 		$stmt = $this->conn->prepare($query);
// 		//Clean data
// 		$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
// 		$this->TenCV = htmlspecialchars(strip_tags($this->TenCV));
// 		$this->PhuCap = htmlspecialchars(strip_tags($this->PhuCap));
// 		$this->DienGiai = htmlspecialchars(strip_tags($this->DienGiai));
	

		
		

// 		//Bind data
// //		$stmt->bindParam(':get_id',$this->MaCV);
// 		$stmt->bindParam(':get_MaCV',$this->MaCV);
// 		$stmt->bindParam(':TenCV',$this->TenCV);
// 		$stmt->bindParam(':PhuCap',$this->PhuCap);
// 		$stmt->bindParam(':DienGiai',$this->DienGiai);
		
		
	
// 		//Execute query
// 		if($stmt->execute()){
// 			return true;
// 		}
// 		//Print error if something goes wrong
// 		printf("Error: %s. \n", $stmt->error);
// 		return false;
// 	}
public function update(){
	//Create query
	$query = "UPDATE $this->table
			  SET 
					TenCV = :TenCV,
					PhuCap = :PhuCap
				  
				 
				  
				
			  WHERE 
					MaCV = :get_MaCV";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
	$this->TenCV = htmlspecialchars(strip_tags($this->TenCV));
	$this->PhuCap = htmlspecialchars(strip_tags($this->PhuCap));
	
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaCV);
	$stmt->bindParam(':get_MaCV',$this->MaCV);
	$stmt->bindParam(':TenCV',$this->TenCV);
	$stmt->bindParam(':PhuCap',$this->PhuCap);
	
	
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
		          WHERE MaCV = :get_MaCV";
		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaCV= htmlspecialchars(strip_tags($this->MaCV));

		//Bind data
		$stmt->bindParam(':get_MaCV',$this->MaCV);

		//Execute query
		if($stmt->execute()){
			return true;
		}

		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;

	}
	public function readMaCV()
	{
		$sql = " Select MaCV FROM chucvu ORDER BY MaCV desc limit 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row){
			$lastMaCV  = $row['MaCV'];
		}
		else
		{
		 	$lastMaCV ='';
		}
		if($lastMaCV =="")
		{
			$MaCVid="CV000001";
		}
		else
		{
			$MaCVid=substr($lastMaCV,2);
			$MaCVid=intval($MaCVid);
			$MaCVid="CV". str_pad($MaCVid +1,6,"0",STR_PAD_LEFT);
				
		}
		return $MaCVid;
	}
}
?>


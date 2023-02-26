<?php  
class phongbano{

	//DB Stuff
	private $conn;
	private $table = "phongban";

	// Properties
	//public $n_nhanvien_id;
	public $MaPB;
	public $TenPB;
	public $DiaChi;
	public $DienGiai;
	
	


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
		$sql = "SELECT * FROM $this->table WHERE MaPB = :get_MaPB";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_MaPB',$this->MaPB);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//Set Properties
		//$this->n_nhanvien_id = $row['MaPB'];
		$this->MaPB = $row['MaPB'];
		$this->TenPB = $row['TenPB'];
		$this->DiaChi = $row['DiaChi'];
		$this->DienGiai = $row['DienGiai'];
		
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaPB = :MaPB,
		          	  TenPB = :TenPB,
		          	  DiaChi = :DiaChi,
						DienGiai = :DienGiai";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaPB = htmlspecialchars(strip_tags($this->MaPB));
		$this->TenPB = htmlspecialchars(strip_tags($this->TenPB));
		$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
		$this->DienGiai = htmlspecialchars(strip_tags($this->DienGiai));
		
		



		//Bind data
		$stmt->bindParam(':MaPB',$this->MaPB);
		$stmt->bindParam(':TenPB',$this->TenPB);
		$stmt->bindParam(':DiaChi',$this->DiaChi);
		$stmt->bindParam(':DienGiai',$this->DienGiai);
		



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
					TenPB = :TenPB,
					DiaChi = :DiaChi,
				  DienGiai = :DienGiai
				 
				  
				
			  WHERE 
					MaPB = :get_MaPB";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaPB = htmlspecialchars(strip_tags($this->MaPB));
	$this->TenPB = htmlspecialchars(strip_tags($this->TenPB));
	$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
	$this->DienGiai = htmlspecialchars(strip_tags($this->DienGiai));
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaPB);
	$stmt->bindParam(':get_MaPB',$this->MaPB);
	$stmt->bindParam(':TenPB',$this->TenPB);
	$stmt->bindParam(':DiaChi',$this->DiaChi);
	$stmt->bindParam(':DienGiai',$this->DienGiai);
	
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
		          WHERE MaPB = :get_MaPB";
		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaPB= htmlspecialchars(strip_tags($this->MaPB));

		//Bind data
		$stmt->bindParam(':get_MaPB',$this->MaPB);

		//Execute query
		if($stmt->execute()){
			return true;
		}

		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;

	}
	public function readMaPB()
	{
		$sql = " Select MaPB FROM phongban ORDER BY MaPB desc limit 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row){
			$lastMaPB  = $row['MaPB'];
		}
		else
		{
		 	$lastMaPB ='';
		}
		if($lastMaPB =="")
		{
			$MaPBid="PB000001";
		}
		else
		{
			$MaPBid=substr($lastMaPB,2);
			$MaPBid=intval($MaPBid);
			$MaPBid="PB". str_pad($MaPBid +1,6,"0",STR_PAD_LEFT);
				
		}
		return $MaPBid;
	}
}
?>


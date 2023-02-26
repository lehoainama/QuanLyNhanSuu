<?php  
class baohiemo{

	//DB Stuff
	private $conn;
	private $table = "baohiem";

	// Properties
	//public $n_nhanvien_id;
	public $MaBH;
	public $MaNV;
	public $ThoiGian;
	public $BHYT;
	public $BHTN;
	public $TongBH;
	
	


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
		$sql = "SELECT * FROM $this->table WHERE MaBH = :get_MaBH";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_MaBH',$this->MaBH);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//Set Properties
		//$this->n_nhanvien_id = $row['MaBH'];
		$this->MaBH = $row['MaBH'];
		$this->MaNV = $row['MaNV'];
		$this->ThoiGian = $row['ThoiGian'];
		$this->BHYT = $row['BHYT'];
		
		$this->BHTN = $row['BHTN'];
		$this->TongBH = $row['TongBH'];
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaBH = :MaBH,
		          	  MaNV = :MaNV,
		          	  ThoiGian = :ThoiGian,
						BHYT = :BHYT,
						BHTN = :BHTN,
						TongBH = :TongBH";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaBH = htmlspecialchars(strip_tags($this->MaBH));
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->ThoiGian = htmlspecialchars(strip_tags($this->ThoiGian));
		$this->BHYT = htmlspecialchars(strip_tags($this->BHYT));
		$this->BHTN = htmlspecialchars(strip_tags($this->BHTN));
		$this->TongBH = htmlspecialchars(strip_tags($this->TongBH));
		
		



		//Bind data
		$stmt->bindParam(':MaBH',$this->MaBH);
		$stmt->bindParam(':MaNV',$this->MaNV);
		$stmt->bindParam(':ThoiGian',$this->ThoiGian);
		$stmt->bindParam(':BHYT',$this->BHYT);
		$stmt->bindParam(':BHTN',$this->BHTN);
		$stmt->bindParam(':TongBH',$this->TongBH);
		
		



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
					MaNV = :MaNV,
					ThoiGian = :ThoiGian,
				    BHYT = :BHYT,
					BHTN = :BHTN,
					TongBH = :TongBH
				 
				  
				
			  WHERE 
					MaBH = :get_MaBH";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaBH = htmlspecialchars(strip_tags($this->MaBH));
	$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
	$this->ThoiGian = htmlspecialchars(strip_tags($this->ThoiGian));
	$this->BHYT = htmlspecialchars(strip_tags($this->BHYT));
	$this->BHTN = htmlspecialchars(strip_tags($this->BHTN));
	$this->TongBH = htmlspecialchars(strip_tags($this->TongBH));
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaBH);
	$stmt->bindParam(':get_MaBH',$this->MaBH);
	$stmt->bindParam(':MaNV',$this->MaNV);
	$stmt->bindParam(':ThoiGian',$this->ThoiGian);
	$stmt->bindParam(':BHYT',$this->BHYT);
	$stmt->bindParam(':BHTN',$this->BHTN);
	$stmt->bindParam(':TongBH',$this->TongBH);
	
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
		          WHERE MaBH = :get_MaBH";
		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaBH= htmlspecialchars(strip_tags($this->MaBH));

		//Bind data
		$stmt->bindParam(':get_MaBH',$this->MaBH);

		//Execute query
		if($stmt->execute()){
			return true;
		}

		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;

	}
	public function readMaBH()
	{
		$sql = " Select MaBH FROM baohiem ORDER BY MaBH desc limit 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row){
			$lastMaBH  = $row['MaBH'];
		}
		else
		{
		 	$lastMaBH ='';
		}
		if($lastMaBH =="")
		{
			$MaBHid="BH0000001";
		}
		else
		{
			$MaBHid=substr($lastMaBH,2);
			$MaBHid=intval($MaBHid);
			$MaBHid="BH". str_pad($MaBHid +1,7,"0",STR_PAD_LEFT);
				
		}
		return $MaBHid;
	}
}
?>


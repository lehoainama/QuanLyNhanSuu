<?php  
class chamcongo{

	//DB Stuff
	private $conn;
	private $table = "chamcong";

	// Properties
	//public $n_nhanvien_id;
	public $MaNV;
	public $ThoiGianChamCong;
	public $NgayChamCong;
	public $SoNgayLam;
	
	


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
		$sql = "SELECT * FROM $this->table WHERE MaNV = :get_MaNV";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_MaNV',$this->MaNV);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		//Set Properties
		//$this->n_nhanvien_id = $row['MaNV'];
		$this->MaNV = $row['MaNV'];
		$this->ThoiGianChamCong = $row['ThoiGianChamCong'];
		$this->NgayChamCong = $row['NgayChamCong'];
		$this->SoNgayLam = $row['SoNgayLam'];
		
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaNV = :MaNV,
		          	  ThoiGianChamCong = :ThoiGianChamCong,
		          	  NgayChamCong = :NgayChamCong,
						SoNgayLam = :SoNgayLam";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->ThoiGianChamCong = htmlspecialchars(strip_tags($this->ThoiGianChamCong));
		$this->NgayChamCong = htmlspecialchars(strip_tags($this->NgayChamCong));
		$this->SoNgayLam = htmlspecialchars(strip_tags($this->SoNgayLam));
		
		



		//Bind data
		$stmt->bindParam(':MaNV',$this->MaNV);
		$stmt->bindParam(':ThoiGianChamCong',$this->ThoiGianChamCong);
		$stmt->bindParam(':NgayChamCong',$this->NgayChamCong);
		$stmt->bindParam(':SoNgayLam',$this->SoNgayLam);
		



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
					ThoiGianChamCong = :ThoiGianChamCong,
					NgayChamCong = :NgayChamCong,
				  SoNgayLam = :SoNgayLam
				 
				  
				
			  WHERE 
					MaNV = :get_MaNV";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
	$this->ThoiGianChamCong = htmlspecialchars(strip_tags($this->ThoiGianChamCong));
	$this->NgayChamCong = htmlspecialchars(strip_tags($this->NgayChamCong));
	$this->SoNgayLam = htmlspecialchars(strip_tags($this->SoNgayLam));
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaNV);
	$stmt->bindParam(':get_MaNV',$this->MaNV);
	$stmt->bindParam(':ThoiGianChamCong',$this->ThoiGianChamCong);
	$stmt->bindParam(':NgayChamCong',$this->NgayChamCong);
	$stmt->bindParam(':SoNgayLam',$this->SoNgayLam);
	
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
		          WHERE MaNV = :get_MaNV";
		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaNV= htmlspecialchars(strip_tags($this->MaNV));

		//Bind data
		$stmt->bindParam(':get_MaNV',$this->MaNV);

		//Execute query
		if($stmt->execute()){
			return true;
		}

		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;

	}
	// public function readMaNV()
	// {
	// 	$sql = " Select MaNV FROM chamcong ORDER BY MaNV desc limit 1";
	// 	$stmt = $this->conn->prepare($sql);
	// 	$stmt->execute();
	// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
	// 	if($row){
	// 		$lastMaNV  = $row['MaNV'];
	// 	}
	// 	else
	// 	{
	// 	 	$lastMaNV ='';
	// 	}
	// 	if($lastMaNV =="")
	// 	{
	// 		$MaNVid="MV000001";
	// 	}
	// 	else
	// 	{
	// 		$MaNVid=substr($lastMaNV,2);
	// 		$MaNVid=intval($MaNVid);
	// 		$MaNVid="ID". str_pad($MaNVid +1,6,"0",STR_PAD_LEFT);
				
	// 	}
	// 	return $MaNVid;
	// }
}
?>


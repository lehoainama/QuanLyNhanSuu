<?php  
class phancongo{

	//DB Stuff
	private $conn;
	private $table = "phancong";

	// Properties
	//public $n_nhanvien_id;
	public $MaNV;
	public $NgayVaoLam;
	public $DiaChi;
	public $CacViTri;
	public $MaPB;
	public $MaCV;
	
	


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
		$this->NgayVaoLam = $row['NgayVaoLam'];
		$this->DiaChi = $row['DiaChi'];
		$this->CacViTri = $row['CacViTri'];
		
		$this->MaPB = $row['MaPB'];
		$this->MaCV = $row['MaCV'];
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaNV = :MaNV,
		          	  NgayVaoLam = :NgayVaoLam,
		          	  DiaChi = :DiaChi,
						CacViTri = :CacViTri,
						MaPB = :MaPB,
						MaCV = :MaCV";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
		$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
		$this->CacViTri = htmlspecialchars(strip_tags($this->CacViTri));
		$this->MaPB = htmlspecialchars(strip_tags($this->MaPB));
		$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
		
		



		//Bind data
		$stmt->bindParam(':MaNV',$this->MaNV);
		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
		$stmt->bindParam(':DiaChi',$this->DiaChi);
		$stmt->bindParam(':CacViTri',$this->CacViTri);
		$stmt->bindParam(':MaPB',$this->MaPB);
		$stmt->bindParam(':MaCV',$this->MaCV);
		
		



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
					NgayVaoLam = :NgayVaoLam,
					DiaChi = :DiaChi,
				    CacViTri = :CacViTri,
					MaPB = :MaPB,
					MaCV = :MaCV
				 
				  
				
			  WHERE 
					MaNV = :get_MaNV";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
	$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
	$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
	$this->CacViTri = htmlspecialchars(strip_tags($this->CacViTri));
	$this->MaPB = htmlspecialchars(strip_tags($this->MaPB));
	$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaNV);
	$stmt->bindParam(':get_MaNV',$this->MaNV);
	$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
	$stmt->bindParam(':DiaChi',$this->DiaChi);
	$stmt->bindParam(':CacViTri',$this->CacViTri);
	$stmt->bindParam(':MaPB',$this->MaPB);
	$stmt->bindParam(':MaCV',$this->MaCV);
	
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
	// 	$sql = " Select MaNV FROM phancong ORDER BY MaNV desc limit 1";
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
	// 		$MaNVid="NV0001";
	// 	}
	// 	else
	// 	{
	// 		$MaNVid=substr($lastMaNV,2);
	// 		$MaNVid=intval($MaNVid);
	// 		$MaNVid="NV". str_pad($MaNVid +1,4,"0",STR_PAD_LEFT);
				
	// 	}
	// 	return $MaNVid;
	// }
}
?>


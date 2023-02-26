<?php  
class luongcobano{

	//DB Stuff
	private $conn;
	private $table = "luongcoban";

	// Properties
	//public $n_nhanvien_id;
	public $MaNV;
	public $NgayVaoLam;
	public $ThoiGianTangLuong;
	public $TongLuongTang;
	
	


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
		$this->ThoiGianTangLuong = $row['ThoiGianTangLuong'];
		$this->TongLuongTang = $row['TongLuongTang'];
		
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaNV = :MaNV,
		          	  NgayVaoLam = :NgayVaoLam,
		          	  ThoiGianTangLuong = :ThoiGianTangLuong,
						TongLuongTang = :TongLuongTang";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
		$this->ThoiGianTangLuong = htmlspecialchars(strip_tags($this->ThoiGianTangLuong));
		$this->TongLuongTang = htmlspecialchars(strip_tags($this->TongLuongTang));
		
		



		//Bind data
		$stmt->bindParam(':MaNV',$this->MaNV);
		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
		$stmt->bindParam(':ThoiGianTangLuong',$this->ThoiGianTangLuong);
		$stmt->bindParam(':TongLuongTang',$this->TongLuongTang);
		



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
// 					NgayVaoLam = :NgayVaoLam,
// 					ThoiGianTangLuong = :ThoiGianTangLuong,
// 				  TongLuongTang = :TongLuongTang
				 
// 			  WHERE 
// 					MaNV = :get_MaNV";
// 		//Prepare statement
// 		$stmt = $this->conn->prepare($query);
// 		//Clean data
// 		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
// 		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
// 		$this->ThoiGianTangLuong = htmlspecialchars(strip_tags($this->ThoiGianTangLuong));
// 		$this->TongLuongTang = htmlspecialchars(strip_tags($this->TongLuongTang));
	

		
		

// 		//Bind data
// //		$stmt->bindParam(':get_id',$this->MaNV);
// 		$stmt->bindParam(':get_MaNV',$this->MaNV);
// 		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
// 		$stmt->bindParam(':ThoiGianTangLuong',$this->ThoiGianTangLuong);
// 		$stmt->bindParam(':TongLuongTang',$this->TongLuongTang);
		
		
	
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
					NgayVaoLam = :NgayVaoLam,
					ThoiGianTangLuong = :ThoiGianTangLuong,
				    TongLuongTang = :TongLuongTang
				 
				  
				
			  WHERE 
					MaNV = :get_MaNV";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
	$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
	$this->ThoiGianTangLuong = htmlspecialchars(strip_tags($this->ThoiGianTangLuong));
	$this->TongLuongTang = htmlspecialchars(strip_tags($this->TongLuongTang));
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaNV);
	$stmt->bindParam(':get_MaNV',$this->MaNV);
	$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
	$stmt->bindParam(':ThoiGianTangLuong',$this->ThoiGianTangLuong);
	$stmt->bindParam(':TongLuongTang',$this->TongLuongTang);
	
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
	public function readMaNV()
	{
		$sql = " Select MaNV FROM luongcoban ORDER BY MaNV desc limit 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row){
			$lastMaNV  = $row['MaNV'];
		}
		else
		{
		 	$lastMaNV ='';
		}
		if($lastMaNV =="")
		{
			$MaNVid="NV000001";
		}
		else
		{
			$MaNVid=substr($lastMaNV,2);
			$MaNVid=intval($MaNVid);
			$MaNVid="NV". str_pad($MaNVid +1,6,"0",STR_PAD_LEFT);
				
		}
		return $MaNVid;
	}
}
?>


<?php  
class luongo{

	//DB Stuff
	private $conn;
	private $table = "luong";

	// Properties
	//public $n_nhanvien_id;
	public $MaNV;
	public $TenNV;
	public $MaCV;
	public $LuongCoBan;

	public $LuongTangThem;
	public $PhuCap;
	public $LuongThuong;
	public $MaBHXH;
	public $SoNgayLam;
	public $TongLuong;
	
	


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
		$this->TenNV = $row['TenNV'];
		$this->MaCV = $row['MaCV'];
		$this->LuongCoBan = $row['LuongCoBan'];
	
		$this->LuongTangThem = $row['LuongTangThem'];
		$this->PhuCap = $row['PhuCap'];
		$this->LuongThuong = $row['LuongThuong'];
		$this->MaBHXH = $row['MaBHXH'];
		$this->SoNgayLam = $row['SoNgayLam'];
	
		
	
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaNV = :MaNV,
		          	  TenNV = :TenNV,
		          	  MaCV = :MaCV,
						LuongCoBan = :LuongCoBan,
						
						LuongTangThem = :LuongTangThem,
						PhuCap = :PhuCap,
						LuongThuong = :LuongThuong,
						MaBHXH = :MaBHXH,
						SoNgayLam = :SoNgayLam
						 ";			
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->TenNV = htmlspecialchars(strip_tags($this->TenNV));
		$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
		$this->LuongCoBan = htmlspecialchars(strip_tags($this->LuongCoBan));
		
		$this->LuongTangThem = htmlspecialchars(strip_tags($this->LuongTangThem));
		$this->PhuCap = htmlspecialchars(strip_tags($this->PhuCap));
		$this->LuongThuong = htmlspecialchars(strip_tags($this->LuongThuong));
		$this->MaBHXH = htmlspecialchars(strip_tags($this->MaBHXH));
		$this->SoNgayLam = htmlspecialchars(strip_tags($this->SoNgayLam));
		
		



		//Bind data
		$stmt->bindParam(':MaNV',$this->MaNV);
		$stmt->bindParam(':TenNV',$this->TenNV);
		$stmt->bindParam(':MaCV',$this->MaCV);
		$stmt->bindParam(':LuongCoBan',$this->LuongCoBan);
	
		$stmt->bindParam(':LuongTangThem',$this->LuongTangThem);
		$stmt->bindParam(':PhuCap',$this->PhuCap);
		$stmt->bindParam(':LuongThuong',$this->LuongThuong);
		$stmt->bindParam(':MaBHXH',$this->MaBHXH);
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
					TenNV = :TenNV,
					MaCV = :MaCV,
				  LuongCoBan = :LuongCoBan,
			
						LuongTangThem = :LuongTangThem,
						PhuCap = :PhuCap,
						LuongThuong = :LuongThuong,
						MaBHXH = :MaBHXH,
						SoNgayLam = :SoNgayLam
						
				 
				  
				
			  WHERE 
					MaNV = :get_MaNV";
	//Prepare statement
	$stmt = $this->conn->prepare($query);
	//Clean data
	$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
	$this->TenNV = htmlspecialchars(strip_tags($this->TenNV));
	$this->MaCV = htmlspecialchars(strip_tags($this->MaCV));
	$this->LuongCoBan = htmlspecialchars(strip_tags($this->LuongCoBan));
	
	$this->LuongTangThem = htmlspecialchars(strip_tags($this->LuongTangThem));
	$this->PhuCap = htmlspecialchars(strip_tags($this->PhuCap));
	$this->LuongThuong = htmlspecialchars(strip_tags($this->LuongThuong));
	$this->MaBHXH = htmlspecialchars(strip_tags($this->MaBHXH));
	$this->SoNgayLam = htmlspecialchars(strip_tags($this->SoNgayLam));
	
	



	//Bind data
//		$stmt->bindParam(':get_id',$this->MaNV);
	$stmt->bindParam(':get_MaNV',$this->MaNV);
	$stmt->bindParam(':TenNV',$this->TenNV);
	$stmt->bindParam(':MaCV',$this->MaCV);
	$stmt->bindParam(':LuongCoBan',$this->LuongCoBan);

		$stmt->bindParam(':LuongTangThem',$this->LuongTangThem);
		$stmt->bindParam(':PhuCap',$this->PhuCap);
		$stmt->bindParam(':LuongThuong',$this->LuongThuong);
		$stmt->bindParam(':MaBHXH',$this->MaBHXH);
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
	
	public function readMaNV()
	{
		$sql = " Select MaNV FROM luong ORDER BY MaNV desc limit 1";
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


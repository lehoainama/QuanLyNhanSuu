<?php  
class nhanvieno{

	//DB Stuff
	private $conn;
	private $table = "nhanvien";

	// Properties
	//public $n_nhanvien_id;		
	public $MaNV;
	public $TenNV;
	public $NgaySinh;
	public $DiaChi;
	public $DienThoai;
	public $TinhTP;
	public $CCCD;
	public $TTHonNhan;
	public $MaBH;
	
	public $GioiTinh;
	public $NgayVaoLam;
	public $TrinhDo;
	public $TinhTrangLamViec;
	public $GhiChu;
	public $d_date_created;
	public $d_time_created;

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
		$this->NgaySinh = $row['NgaySinh'];
		$this->DiaChi = $row['DiaChi'];
		$this->DienThoai = $row['DienThoai'];

		$this->TinhTP = $row['TinhTP'];
		$this->CCCD = $row['CCCD'];
		$this->TTHonNhan = $row['TTHonNhan'];
		$this->MaBH = $row['MaBH'];

	
		$this->GioiTinh = $row['GioiTinh'];
		$this->NgayVaoLam = $row['NgayVaoLam'];
		$this->TrinhDo = $row['TrinhDo'];
		$this->TinhTrangLamViec = $row['TinhTrangLamViec'];
		$this->GhiChu = $row['GhiChu'];


		$this->d_date_created = $row['d_date_created'];
		$this->d_time_created = $row['d_date_created'];
		
	}

	//Create employee
	public function create(){
		//Create query
		$query = "INSERT INTO $this->table
		          SET MaNV = :MaNV,
		          	  TenNV = :TenNV,
		          	  NgaySinh = :NgaySinh,
					  DiaChi = :DiaChi,
					  DienThoai = :DienThoai,
					  TinhTP = :TinhTP,
					  CCCD = :CCCD,
					  TTHonNhan = :TTHonNhan,
					  MaBH = :MaBH,

					  
					  GioiTinh = :GioiTinh,
					  NgayVaoLam = :NgayVaoLam,
					  TrinhDo = :TrinhDo,
					  TinhTrangLamViec = :TinhTrangLamViec, 
					  GhiChu = :GhiChu,
					 
		          	  d_date_created = :date_created,
		          	  d_time_created = :time_created";		
		//Prepare statement
		$stmt = $this->conn->prepare($query);

		//Clean data
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->TenNV = htmlspecialchars(strip_tags($this->TenNV));
		$this->NgaySinh = htmlspecialchars(strip_tags($this->NgaySinh));
		$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
		$this->DienThoai = htmlspecialchars(strip_tags($this->DienThoai));
		$this->TinhTP = htmlspecialchars(strip_tags($this->TinhTP));
		$this->CCCD = htmlspecialchars(strip_tags($this->CCCD));
		$this->TTHonNhan = htmlspecialchars(strip_tags($this->TTHonNhan));
		$this->MaBH = htmlspecialchars(strip_tags($this->MaBH));

		
		$this->GioiTinh = htmlspecialchars(strip_tags($this->GioiTinh));
		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
		$this->TrinhDo = htmlspecialchars(strip_tags($this->TrinhDo));
		$this->TinhTrangLamViec = htmlspecialchars(strip_tags($this->TinhTrangLamViec));
		$this->GhiChu = htmlspecialchars(strip_tags($this->GhiChu));
		



		//Bind data
		$stmt->bindParam(':MaNV',$this->MaNV);
		$stmt->bindParam(':TenNV',$this->TenNV);
		$stmt->bindParam(':NgaySinh',$this->NgaySinh);
		$stmt->bindParam(':DiaChi',$this->DiaChi);
		$stmt->bindParam(':DienThoai',$this->DienThoai);
		$stmt->bindParam(':TinhTP',$this->TinhTP);
		$stmt->bindParam(':CCCD',$this->CCCD);
		$stmt->bindParam(':TTHonNhan',$this->TTHonNhan);
		$stmt->bindParam(':MaBH',$this->MaBH);

		
		$stmt->bindParam(':GioiTinh',$this->GioiTinh);
		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
		$stmt->bindParam(':TrinhDo',$this->TrinhDo);
		$stmt->bindParam(':TinhTrangLamViec',$this->TinhTrangLamViec);
		$stmt->bindParam(':GhiChu',$this->GhiChu);


		$stmt->bindParam(':date_created',$this->d_date_created);
		$stmt->bindParam(':time_created',$this->d_time_created);

		//Execute query
		if($stmt->execute()){
			return true;
		}
		//Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);
		return false;
	}

	//Update employee
	public function update(){
		//Create query
		$query = "UPDATE $this->table
		          SET 
		          	  TenNV = :TenNV,
		          	  NgaySinh = :NgaySinh,
					  DiaChi = :DiaChi,
					  DienThoai = :DienThoai,
					  TinhTP = :TinhTP,
					  CCCD = :CCCD,
					  TTHonNhan = :TTHonNhan,
					  MaBH = :MaBH,
					  
					  
					  GioiTinh = :GioiTinh,
					  NgayVaoLam = :NgayVaoLam,
					  TrinhDo = :TrinhDo,
					  TinhTrangLamViec = :TinhTrangLamViec, 
					  GhiChu = :GhiChu,

		          	  d_date_created = :date_created,
		          	  d_time_created = :time_created
		          WHERE 
		          	  MaNV = :get_MaNV";
		//Prepare statement
		$stmt = $this->conn->prepare($query);
		//Clean data
		$this->MaNV = htmlspecialchars(strip_tags($this->MaNV));
		$this->TenNV = htmlspecialchars(strip_tags($this->TenNV));
		$this->NgaySinh = htmlspecialchars(strip_tags($this->NgaySinh));
		$this->DiaChi = htmlspecialchars(strip_tags($this->DiaChi));
		$this->DienThoai = htmlspecialchars(strip_tags($this->DienThoai));
		$this->TinhTP = htmlspecialchars(strip_tags($this->TinhTP));
		$this->CCCD = htmlspecialchars(strip_tags($this->CCCD));
		$this->TTHonNhan = htmlspecialchars(strip_tags($this->TTHonNhan));
		$this->MaBH = htmlspecialchars(strip_tags($this->MaBH));

		
		$this->GioiTinh = htmlspecialchars(strip_tags($this->GioiTinh));
		$this->NgayVaoLam = htmlspecialchars(strip_tags($this->NgayVaoLam));
		$this->TrinhDo = htmlspecialchars(strip_tags($this->TrinhDo));
		$this->TinhTrangLamViec = htmlspecialchars(strip_tags($this->TinhTrangLamViec));
		$this->GhiChu = htmlspecialchars(strip_tags($this->GhiChu));

		//Bind data
//		$stmt->bindParam(':get_id',$this->MaNV);
		$stmt->bindParam(':get_MaNV',$this->MaNV);
		$stmt->bindParam(':TenNV',$this->TenNV);
		$stmt->bindParam(':NgaySinh',$this->NgaySinh);
		$stmt->bindParam(':DiaChi',$this->DiaChi);
		$stmt->bindParam(':DienThoai',$this->DienThoai);
		$stmt->bindParam(':TinhTP',$this->TinhTP);
		$stmt->bindParam(':CCCD',$this->CCCD);
		$stmt->bindParam(':TTHonNhan',$this->TTHonNhan);
		$stmt->bindParam(':MaBH',$this->MaBH);

		
		$stmt->bindParam(':GioiTinh',$this->GioiTinh);
		$stmt->bindParam(':NgayVaoLam',$this->NgayVaoLam);
		$stmt->bindParam(':TrinhDo',$this->TrinhDo);
		$stmt->bindParam(':TinhTrangLamViec',$this->TinhTrangLamViec);
		$stmt->bindParam(':GhiChu',$this->GhiChu);
		
		$stmt->bindParam(':date_created',$this->d_date_created);
		$stmt->bindParam(':time_created',$this->d_time_created);
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
		$sql = " Select MaNV FROM nhanvien ORDER BY MaNV desc limit 1";
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
			$manvid="NV000001";
		}
		else
		{
			$manvid=substr($lastMaNV,2);
			$manvid=intval($manvid);
			$manvid="NV". str_pad($manvid +1,6,"0",STR_PAD_LEFT);
				
		}
		return $manvid;
	}
}
?>


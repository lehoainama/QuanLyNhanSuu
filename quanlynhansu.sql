-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2023 lúc 12:55 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baohiem`
--

CREATE TABLE `baohiem` (
  `MaBH` char(20) NOT NULL,
  `MaNV` char(20) NOT NULL,
  `ThoiGian` date NOT NULL,
  `BHYT` varchar(30) NOT NULL,
  `BHTN` varchar(30) NOT NULL,
  `TongBH` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baohiem`
--

INSERT INTO `baohiem` (`MaBH`, `MaNV`, `ThoiGian`, `BHYT`, `BHTN`, `TongBH`) VALUES
('BH0000001', 'NV000001', '2022-12-12', '67000', '500000', '567000'),
('BH0000002', 'NV000002', '2022-12-12', '67000', '500000', '567000'),
('BH0000003', 'NV000003', '2006-02-12', '', '500000', '500000'),
('BH0000004', 'NV000004', '2022-12-12', '67000', '', '67000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `MaNV` char(20) NOT NULL,
  `ThoiGianChamCong` date NOT NULL,
  `NgayChamCong` date NOT NULL,
  `SoNgayLam` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`MaNV`, `ThoiGianChamCong`, `NgayChamCong`, `SoNgayLam`) VALUES
('NV000001', '2022-12-12', '2023-01-12', '30'),
('NV000002', '2022-12-12', '2023-01-12', '30'),
('NV000003', '2022-12-12', '2023-01-12', '30'),
('NV000004', '2022-12-12', '2023-01-11', '29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` char(20) NOT NULL,
  `TenCV` varchar(30) NOT NULL,
  `PhuCap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`, `PhuCap`) VALUES
('CV000001', 'Nhân Viên', '20000'),
('CV000002', 'Trưởng Phòng', '30000'),
('CV000003', 'Giám Đốc', '40000'),
('CV000004', 'Phó Giám Đốc', '35000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `username` char(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`username`, `password`) VALUES
('0', '123'),
('admin', '123'),
('admin1', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `MaNV` char(20) NOT NULL,
  `TenNV` varchar(30) NOT NULL,
  `MaCV` char(20) NOT NULL,
  `LuongCoBan` double NOT NULL,
  `HeSoLuong` varchar(10) NOT NULL,
  `LuongTangThem` double NOT NULL,
  `PhuCap` double NOT NULL,
  `LuongThuong` double NOT NULL,
  `MaBHXH` char(20) NOT NULL,
  `SoNgayLam` int(30) NOT NULL,
  `TongLuong` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`MaNV`, `TenNV`, `MaCV`, `LuongCoBan`, `HeSoLuong`, `LuongTangThem`, `PhuCap`, `LuongThuong`, `MaBHXH`, `SoNgayLam`, `TongLuong`) VALUES
('NV000001', 'Lê Hoài Nam', 'CV000002', 125000, '', 0, 0, 0, 'BH000001', 30, ''),
('NV000002', 'Lương Vĩnh Hưng', 'CV000001', 150000, '', 20000, 0, 0, 'BH000002', 30, ''),
('NV000003', 'Trịnh Quý Dương', 'CV000001', 160000, '', 20000, 20000, 0, 'BH000003', 30, ''),
('NV000004', 'Nguyễn Hoài Linh', 'CV000003', 130000, '', 25000, 20000, 10000, 'BH000004', 29, ''),
('NV000005', 'Nam', 'CV000002', 100000, '', 75000, 20000, 40000, 'BH123919', 3, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luongcoban`
--

CREATE TABLE `luongcoban` (
  `MaNV` char(20) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `ThoiGianTangLuong` date NOT NULL,
  `TongLuongTang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luongcoban`
--

INSERT INTO `luongcoban` (`MaNV`, `NgayVaoLam`, `ThoiGianTangLuong`, `TongLuongTang`) VALUES
('NV000001', '2022-12-02', '2023-12-02', 1500000),
('NV000002', '2022-12-02', '2023-12-02', 1500000),
('NV000003', '2022-12-10', '2023-12-10', 1500000),
('NV000004', '2022-12-02', '2023-12-02', 1500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` char(20) NOT NULL,
  `TenNV` varchar(30) DEFAULT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `TinhTP` varchar(50) NOT NULL,
  `DienThoai` char(10) NOT NULL,
  `Fax` varchar(50) NOT NULL,
  `CCCD` char(50) NOT NULL,
  `TTHonNhan` varchar(50) NOT NULL,
  `MaBH` varchar(20) NOT NULL,
  `GioiTinh` char(3) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `TrinhDo` varchar(50) NOT NULL,
  `TinhTrangLamViec` varchar(50) NOT NULL,
  `GhiChu` varchar(50) NOT NULL,
  `d_date_created` date NOT NULL,
  `d_time_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `NgaySinh`, `DiaChi`, `TinhTP`, `DienThoai`, `Fax`, `CCCD`, `TTHonNhan`, `MaBH`, `GioiTinh`, `NgayVaoLam`, `TrinhDo`, `TinhTrangLamViec`, `GhiChu`, `d_date_created`, `d_time_created`) VALUES
('NV000001', 'Nam', '2002-08-02', '47 Nguyễn Thị Thập', 'TPHCM', '09', '', '0003839402', 'Độc Thân', 'BH000001', 'Nam', '2022-12-02', '12/12', 'Nhân Viênn', '', '2023-01-06', '2008-05-18'),
('NV000002', 'Hoài Nam', '2002-08-08', '47 Nguyễn Thị Thập', 'Vũng Tàu', '090909023', '', '0003839402', 'Kết Hôn', 'BH000004', 'Nam', '2022-12-02', '12/12', 'Đã Thôi Việc', '', '2023-01-06', '0000-00-00'),
('NV000003', 'Nguyễn Hoài Linh', '2002-08-02', '47 Nguyễn Thị Thập', 'Long An', '0909090918', '', '0003839402', 'Độc Thân', 'BH000004', 'Nam', '2022-12-02', '12/12', 'Đang Làm Việc', '', '2023-01-06', '2008-07-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `MaNV` char(20) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `CacViTri` varchar(30) NOT NULL,
  `MaPB` char(20) NOT NULL,
  `MaCV` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`MaNV`, `NgayVaoLam`, `DiaChi`, `CacViTri`, `MaPB`, `MaCV`) VALUES
('NV000001', '2022-12-02', '47 Nguyễn Thị Thập', 'Trưởng Phòng', 'PB000002', 'CV000002'),
('NV000002', '2022-12-02', '47 Nguyễn Thị Thập', 'Kế Toán', 'PB000001', 'CV000001'),
('NV000003', '2022-12-02', '47 Nguyễn Thị Thập', 'Nhân Viên', 'PB000002', 'CV000001'),
('NV000004', '2022-12-02', '47 Nguyễn Thị Thập', 'Giám Đốc', 'PB000006', 'CV000003');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` char(20) NOT NULL,
  `TenPB` varchar(30) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `DienGiai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`, `DiaChi`, `DienGiai`) VALUES
('PB000001', 'Kế Toán', '47 Nguyễn Thị Thập', ''),
('PB000002', 'Phòng Đào Tạo', '47 Nguyễn Thị Thập', ''),
('PB000003', 'Kế Toán', '47 Nguyễn Thị Thập', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phucap`
--

CREATE TABLE `phucap` (
  `Onha` varchar(30) NOT NULL,
  `AnUong` varchar(30) NOT NULL,
  `CaDem` varchar(30) NOT NULL,
  `DiLai` varchar(30) NOT NULL,
  `NgoaiNgu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phucap`
--

INSERT INTO `phucap` (`Onha`, `AnUong`, `CaDem`, `DiLai`, `NgoaiNgu`) VALUES
('20000', '40000', '50000', '30000', '60000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `SoID` char(20) NOT NULL,
  `TenTaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `TinhTrang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`SoID`, `TenTaiKhoan`, `MatKhau`, `TinhTrang`) VALUES
('1', 'admin', '123', ''),
('2', 'admin1', '123', 'bikhoa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baohiem`
--
ALTER TABLE `baohiem`
  ADD PRIMARY KEY (`MaBH`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `luongcoban`
--
ALTER TABLE `luongcoban`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- Chỉ mục cho bảng `phucap`
--
ALTER TABLE `phucap`
  ADD PRIMARY KEY (`Onha`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`SoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

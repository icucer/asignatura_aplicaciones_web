-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 06:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `categoria_producto`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `categoriaID` int(3) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`categoriaID`, `nombre_categoria`) VALUES
(7, 'lenovo_desktop'),
(8, 'lenovo_notebooks'),
(9, 'monitores'),
(10, 'accesorios'),
(11, 'software');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `productoID` int(16) NOT NULL,
  `nombre_producto` varchar(200) DEFAULT NULL,
  `imagenProducto` varchar(255) DEFAULT NULL,
  `descripcion_producto` text DEFAULT NULL,
  `precio_producto` int(5) DEFAULT NULL,
  `categoriaID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`productoID`, `nombre_producto`, `imagenProducto`, `descripcion_producto`, `precio_producto`, `categoriaID`) VALUES
(14, 'PC LENOVO M725s SFF Ryzen 7 Pro 2700 8GB 500GB', '../assets/img/img_upload/lenovo_desktop.webp', 'El ThinkCentre M725s de 8,4 l tiene mucho poder en un formato pequeño. Este sistema de sobremesa para empresas está equipado con los últimos procesadores AMD Ryzen® Pro y la tarjeta gráfica Radeon™ Vega para poder realizar tareas múltiples fácilmente y manejar muchos archivos. Y sus funciones de seguridad mejoradas mantendrán seguros tus datos comerciales importantes.\r\n', 259900, 7),
(15, 'ThinkCentre Neo 50s 4ta Gen - Black', '../assets/img/img_upload/lenovo_desktop_2', 'Intel® Core™ i7-13700, 16GB RAM DDR4, 512GB NVMe, DVD±RW, Intel® UHD Graphics 770, VGA, HDMI, DisplayPort, GigaLAN, USB-C, lector SD, teclado y ratón USB, altavoz interno, Windows 11 Pro, SFF, negro, 4.5Kg\r\n', 1249990, 7),
(16, 'ThinkPad E16 - Graphite Black (Intel)', '../assets/img/img_upload/laptop.avif', 'La laptop Lenovo ThinkPad E16 (16\", Intel) irradia potencia, rendimiento fiable y seguridad robusta para todas tus necesidades empresariales. Está diseñada para manejar grandes cargas de trabajo y es perfecta para la tabulación de datos, trabajos rápidos de diseño, investigación y revisión de contenidos. Equipada con un procesador Intel® Core™ i7 de hasta 13ra generación, gráficos UMA integrados o gráficos discretos NVIDIA® GeForce®, y amplia memoria y almacenamiento SSD, la E16 ofrece un rendimiento ultrarrápido.', 1119991, 8),
(17, 'ThinkVision T24m-20 23.8inch Monitor', '../assets/img/img_upload/monitor.avif', 'Un monitor que no es solo otra pantalla, ThinkVision T24m-20 ofrece una conectividad y una capacidad de gestión sencillas para las empresas. Disfrute del amplio espacio de pantalla de 23,8\" en este panel de conmutación en el mismo plano FHD. Con biseles NearEdgeless de 3 lados y capacidad de encadenar mediante el puerto de salida DP, disfrute de una visualización sin restricciones y de multitareas en una configuración de varios monitores.', 299991, 9),
(18, 'Mochila Lenovo casual para equipos portátiles de 39,6 cm (15,6\") B210', '../assets/img/img_upload/accesorios.avif', 'Diseño casual y estilizado; Tela repelente al agua de alta calidad y duradera; Gran capacidad de almacenamiento: se adapta a sistemas portátiles de 39,6 cm (15,6\"); Compartimentos y bolsillos bien posicionados.', 14990, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoriaID`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productoID`),
  ADD KEY `llaves_foraneas_categorias` (`categoriaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoriaID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `productoID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `llaves_foraneas_categorias` FOREIGN KEY (`categoriaID`) REFERENCES `categorias` (`categoriaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

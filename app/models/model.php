<?php
require_once('config/config.php');

class Model{

    protected $db;
    
    public function __construct() {
        global $configuracion;

            $user = $configuracion['usuario'];
            $password = $configuracion['password'];
            $database = $configuracion['basenombre'];
            $host = $configuracion['host'];
        $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$password);
        $this->deploy();
    }
    
    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            
            $hashed_password = '$2y$10$fOmfNDoBopb2.lQpbRmFLOIY5wMR.zoWNl154xeCtZkue4s4es2sq';
            
            $sql = "
            
                -- phpMyAdmin SQL Dump
                -- version 5.2.1
                -- https://www.phpmyadmin.net/
                --
                -- Servidor: 127.0.0.1
                -- Tiempo de generación: 22-10-2024 a las 16:10:07
                -- Versión del servidor: 10.4.32-MariaDB
                -- Versión de PHP: 8.2.12

                SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
                START TRANSACTION;
                SET time_zone = '+00:00';


                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;

                --
                -- Base de datos: `db_veterinaria`
                --

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `clientes`
                --

                CREATE TABLE `clientes` (
                `id` int(11) NOT NULL,
                `nombre` varchar(100) NOT NULL,
                `telefono` varchar(20) NOT NULL,
                `direccion` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

                --
                -- Volcado de datos para la tabla `clientes`
                --

                INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `direccion`) VALUES
                (1, 'María González', '249 1234-5678', 'Calle Falsa 123'),
                (2, 'Juan Pérez', '249 234-5678', 'Avenida Siempreviva 742'),
                (3, 'Lucía Martínez', '249 987-6543', 'Calle Independencia 456'),
                (4, 'Roberto Fernández', '249 654-3210', 'Boulevard Oroño 789'),
                (5, 'Sofía López', '249 2345-6789', 'Calle Corrientes 1500'),
                (6, 'Pablo Ramírez', '249 876-5432', 'Pasaje Mitre 245'),
                (7, 'Ana Gómez', '249 543-2109', 'Calle Belgrano 768'),
                (8, 'Carlos Torres', '249 210-9876', 'Avenida Colón 1001'),
                (9, 'Laura Acosta', '249 765-4321', 'Calle Rivadavia 333'),
                (10, 'Ricardo Herrera', '249 4321-0987', 'Pasaje San Martín 556'),
                (11, 'Valeria Sosa', '249 678-5432', 'Calle Alvear 321'),
                (12, 'Ignacio Díaz', '249 4567-8901', 'Calle Urquiza 908'),
                (13, 'Fernanda Ruiz', '249 789-0123', 'Avenida Alem 990'),
                (14, 'Guillermo Medina', '249 6543-2109', 'Calle Moreno 456'),
                (15, 'Julia Ríos', '249 890-1234', 'Calle España 300'),
                (16, 'Esteban Molina', '249 3210-9876', 'Calle San Lorenzo 100'),
                (17, 'Carla Ponce', '249 432-1098', 'Calle Brown 567'),
                (18, 'Marta Vázquez', '249 543-6789', 'Calle Castelli 891'),
                (19, 'Luis Aranda', '249 6789-5432', 'Avenida Libertad 123'),
                (20, 'Gabriela Cáceres', '249 9876-5432', 'Pasaje Tucumán 400');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `mascotas`
                --

                CREATE TABLE `mascotas` (
                `id` int(11) NOT NULL,
                `nombre` varchar(100) NOT NULL,
                `especie` varchar(50) NOT NULL,
                `raza` varchar(50) NOT NULL,
                `propietario_id` int(11) DEFAULT NULL,
                `historia_clinica` text DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

                --
                -- Volcado de datos para la tabla `mascotas`
                --

                INSERT INTO `mascotas` (`id`, `nombre`, `especie`, `raza`, `propietario_id`, `historia_clinica`) VALUES
                (1, 'Max', 'Perro', 'Labrador', 1, 'Vacunas al día. Operación de cadera en 2023.'),
                (2, 'Luna', 'Gato', 'Siames', 2, 'Esterilizada en 2022. No presenta enfermedades.'),
                (3, 'Rocky', 'Perro', 'Bulldog', 3, 'Tratamiento de alergias desde 2021.'),
                (4, 'Simba', 'Gato', 'Persa', 4, 'Operación ocular en 2022. Recuperado satisfactoriamente.'),
                (5, 'Toby', 'Perro', 'Beagle', 5, 'Vacunas al día. Problemas de sobrepeso controlados.'),
                (6, 'Chloe', 'Gato', 'Bengalí', 6, 'Leve gingivitis. Se sugiere limpieza dental anual.'),
                (7, 'Buddy', 'Perro', 'Golden Retriever', 7, 'Tratamiento para displasia de cadera en curso.'),
                (8, 'Milo', 'Gato', 'Maine Coon', 1, 'Vacunado en 2023. Se le detectaron problemas renales leves.'),
                (9, 'Bella', 'Perro', 'Chihuahua', 9, 'Problemas cardíacos monitoreados desde 2022.'),
                (10, 'Nala', 'Gato', 'Angora', 10, 'Vacunada en 2021. Sin antecedentes importantes.'),
                (11, 'Duke', 'Perro', 'Doberman', 11, 'Castrado en 2020. Revisión anual sin novedades.'),
                (12, 'Coco', 'Gato', 'Abisinio', 12, 'Sufrió una fractura en la pata en 2023. Ya recuperado.'),
                (13, 'Rex', 'Perro', 'Pastor Alemán', 13, 'Problemas de artrosis desde 2022. Control mensual.'),
                (14, 'Oliver', 'Gato', 'Ragdoll', 4, 'Operación de riñón en 2022. En tratamiento.'),
                (15, 'Bruno', 'Perro', 'Pitbull', 5, 'Tratamiento para ansiedad desde 2021. Monitoreado.'),
                (16, 'Mia', 'Gato', 'Esfinge', 6, 'Esterilizada en 2020. Sin enfermedades importantes.'),
                (17, 'Zeus', 'Perro', 'Husky Siberiano', 7, 'Castrado en 2019. Leve catarata en ojo izquierdo.');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `productos`
                --

                CREATE TABLE `productos` (
                `id` int(11) NOT NULL,
                `nombre` varchar(100) NOT NULL,
                `descripcion` text DEFAULT NULL,
                `precio` decimal(10,2) NOT NULL,
                `stock` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

                --
                -- Volcado de datos para la tabla `productos`
                --

                INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`) VALUES
                (1, 'Alimento para perros', 'Bolsa de 10kg de alimento balanceado para perros adultos', 1200.50, 50),
                (2, 'Alimento para gatos', 'Bolsa de 5kg de alimento premium para gatos', 850.75, 40),
                (3, 'Collar antipulgas para perros', 'Collar antipulgas efectivo por 3 meses para perros grandes', 350.00, 25),
                (4, 'Juguete para gatos', 'Pelota con sonido para gatos', 250.00, 30),
                (5, 'Champú antipulgas', 'Champú especial para eliminar pulgas en perros y gatos', 150.00, 60),
                (6, 'Arena para gatos', 'Arena aglomerante para gatos 5kg', 200.00, 80),
                (7, 'Cama para perros', 'Cama acolchada grande para perros', 1200.00, 15),
                (8, 'Cama para gatos', 'Cama suave para gatos', 800.00, 20),
                (9, 'Cepillo dental para perros', 'Cepillo dental especial para higiene oral de perros', 75.00, 100),
                (10, 'Cepillo para gatos', 'Cepillo de pelo para gatos con cerdas suaves', 50.00, 70),
                (11, 'Hueso de juguete', 'Hueso de goma resistente para perros', 180.00, 50),
                (12, 'Comedero para perros', 'Comedero de acero inoxidable para perros medianos', 120.00, 60),
                (13, 'Comedero para gatos', 'Comedero doble de cerámica para gatos', 150.00, 30),
                (14, 'Correa para perros', 'Correa retráctil para perros hasta 20kg', 300.00, 40),
                (15, 'Transportadora para gatos', 'Transportadora pequeña para gatos', 600.00, 10),
                (16, 'Transportadora para perros', 'Transportadora mediana para perros', 850.00, 8),
                (17, 'Rascador para gatos', 'Rascador mediano con base estable', 500.00, 20),
                (18, 'Peine para perros', 'Peine especial para razas de pelo largo', 80.00, 55),
                (19, 'Caseta para perros', 'Caseta de madera impermeable para perros medianos', 1800.00, 5),
                (20, 'Correa para gatos', 'Correa suave y ajustable para gatos', 100.00, 25),
                (21, 'Alimento húmedo para perros', 'Lata de 400g de alimento húmedo sabor carne', 50.00, 120),
                (22, 'Alimento húmedo para gatos', 'Lata de 200g de alimento húmedo para gatos', 40.00, 90),
                (23, 'Snacks para perros', 'Snacks de pollo deshidratado para perros', 90.00, 70),
                (24, 'Snacks para gatos', 'Golosinas crujientes para gatos sabor salmón', 60.00, 65),
                (25, 'Collar luminoso para perros', 'Collar LED para visibilidad nocturna', 250.00, 30),
                (26, 'Collar de cuero para perros', 'Collar de cuero resistente para perros grandes', 300.00, 20),
                (27, 'Placa identificativa para perros', 'Placa metálica grabada con el nombre del perro', 120.00, 50),
                (28, 'Placa identificativa para gatos', 'Placa grabada con el nombre y número de contacto', 110.00, 55),
                (29, 'Botas protectoras para perros', 'Botas para proteger las patas en terrenos difíciles', 400.00, 15),
                (30, 'Alimento para peces', 'Alimento granulado para peces tropicales', 60.00, 100),
                (31, 'Filtro para pecera', 'Filtro interno para pecera de hasta 50 litros', 350.00, 10),
                (32, 'Juguete para roedores', 'Rueda de ejercicio para hámster', 120.00, 25),
                (33, 'Casita para roedores', 'Casita de madera para cobayas', 200.00, 15),
                (34, 'Jaula para aves', 'Jaula grande para loros con accesorios', 1200.00, 5),
                (35, 'Alimento para aves', 'Alimento balanceado para aves tropicales', 80.00, 40),
                (36, 'Alimento para conejos', 'Alimento pelletizado para conejos adultos', 150.00, 60),
                (37, 'Jaula para conejos', 'Jaula espaciosa con bebedero y comedero', 700.00, 12),
                (38, 'Bebedero para roedores', 'Bebedero automático para hámster y cobayas', 90.00, 70),
                (39, 'Terrario para reptiles', 'Terrario de vidrio con ventilación superior', 1500.00, 7),
                (40, 'Alimento para tortugas', 'Alimento granulado para tortugas acuáticas', 70.00, 90),
                (41, 'Lámpara para reptiles', 'Lámpara UVB para terrarios de reptiles', 250.00, 12),
                (42, 'Calentador para peceras', 'Calentador de agua para peceras de hasta 100 litros', 300.00, 8),
                (43, 'Sustrato para reptiles', 'Sustrato especial para terrarios secos', 120.00, 20),
                (44, 'Plataforma para tortugas', 'Plataforma flotante para tortugas acuáticas', 180.00, 15),
                (45, 'Kit de limpieza para peceras', 'Kit completo para la limpieza y mantenimiento de peceras', 250.00, 25),
                (46, 'Juguete interactivo para gatos', 'Juguete automático con luces y movimientos para gatos', 450.00, 10),
                (47, 'Ropa para perros pequeños', 'Abrigo impermeable para perros pequeños', 350.00, 18),
                (48, 'Ropa para perros medianos', 'Jersey de lana para perros medianos', 400.00, 20);

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `turnos`
                --

                CREATE TABLE `turnos` (
                `id` int(11) NOT NULL,
                `nombre` varchar(20) NOT NULL,
                `mascota` varchar(20) NOT NULL,
                `fecha` date NOT NULL,
                `hora` time NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

                --
                -- Volcado de datos para la tabla `turnos`
                --

                INSERT INTO `turnos` (`id`, `nombre`, `mascota`, `fecha`, `hora`) VALUES
                (1, 'Mariana Pérez', 'Luna', '2024-11-02', '10:30:00'),
                (2, 'Juan Gómez', 'Rex', '2024-11-03', '11:15:00'),
                (3, 'Lucía Fernández', 'Bella', '2024-11-04', '09:00:00'),
                (4, 'Carlos Díaz', 'Max', '2024-11-05', '14:45:00'),
                (5, 'Ana Torres', 'Milo', '2024-11-06', '13:30:00');

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `clientes`
                --
                ALTER TABLE `clientes`
                ADD PRIMARY KEY (`id`);

                --
                -- Indices de la tabla `mascotas`
                --
                ALTER TABLE `mascotas`
                ADD PRIMARY KEY (`id`),
                ADD KEY `propietario_id` (`propietario_id`);

                --
                -- Indices de la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD PRIMARY KEY (`id`);

                --
                -- Indices de la tabla `turnos`
                --
                ALTER TABLE `turnos`
                ADD PRIMARY KEY (`id`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `clientes`
                --
                ALTER TABLE `clientes`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

                --
                -- AUTO_INCREMENT de la tabla `mascotas`
                --
                ALTER TABLE `mascotas`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

                --
                -- AUTO_INCREMENT de la tabla `productos`
                --
                ALTER TABLE `productos`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

                --
                -- AUTO_INCREMENT de la tabla `turnos`
                --
                ALTER TABLE `turnos`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `mascotas`
                --
                ALTER TABLE `mascotas`
                ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`propietario_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 


                ";
            $this->db->query($sql);
        }
    }
    protected function crearConexion () {
            
        global $configuracion;

            $user = $configuracion['usuario'];
            $password = $configuracion['password'];
            $database = $configuracion['basenombre'];
            $host = $configuracion['host'];
        
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
            } catch (\Throwable $th) {
                die($th);
                }
            return $pdo;
    }

}
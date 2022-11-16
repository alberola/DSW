

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `telefono` int(12) DEFAULT NULL,
  `direccioncalle` varchar(255) DEFAULT NULL,
  `codigopostal` varchar(255) DEFAULT NULL,
  `poblacion` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `dninif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO clientes (`id`, `nombre`, `apellidos`, `email`, `usuario`, `contrasena`, `telefono`, `direccioncalle`, `codigopostal`, `poblacion`, `pais`, `dninif`) VALUES
(1, 'Jorge', 'Hernández', 'jorge.evagd@gmail.com', 'jorge', '1234', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Alejandro', 'Alberola', 'alejandroalberola140495@gmail.com', 'alejandrogp00', '123ale123', NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `activado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

insert into productos (`id`,`nombre`, `descripcion`, `precio`, `activado`) VALUES
 (1,'Lámpara Luna','Lámpara para decoración con fotos en forma de luna', 30.00, 1),
 (2,'Cuadros Decoración','Cuadros en 3D para decorar tu habitación ', 20.00, 1),
 (3,'Cubre faros Hella Xr2i','Tapa faros antiniebla para ford Xr2i', 15.00, 1),
 (4,'Trofeos de temática personalizada','Trofeos en base de piedra con diseño personalizado según la disciplina ', 25.00, 1),
 (5,'Reconocimientos Grabados en láser ','Reconocimientos en base de piedra con diseño personalizado según la disciplina ', 10.00, 1),
 (6,'Miniaturas  y Warhammer','Figuras de hasta 15 cm de altura hechas en resina con una alta resolución', 20.00, 1),
 (7,'Adornos de Navidad ','Figuras, nombres y decoración para tu árbol de navidad', 5.00, 1),
 (8,'Lámpara cubo ','Lámparas personalizadas con tus fotos favoritas.', 35.00, 1);


CREATE TABLE IF NOT EXISTS `imagenesproductos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idproducto` int(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO imagenesproductos (`id`,`idproducto`, `imagen`, `titulo`, `descripcion`) VALUES
(1,1, 'lamparaLuna1.jpg', 'Lámpara Luna', 'Foto lámpara luna 1'),
(2,1, 'lamparaLuna2.jpg', 'Lámpara Luna', 'Foto lámpara luna 2'),
(3,1, 'lamparaLuna3.jpeg', 'Lámpara Luna', 'Foto lámpara luna 3'),
(4,2, 'cuadro1.jpeg', 'Cuadro', 'Foto de cuadro 1'),
(5,2, 'cuadro2.jpeg', 'Cuadro', 'Foto de cuadro 2'),
(6,2, 'cuadro3.jpeg', 'Cuadro', 'Foto de cuadro 3'),
(7,3, 'cubreFaros1.jpeg', 'Cubre Faros', 'Foto tapa cubre faros 1'),
(8,3, 'cubreFaros2.jpeg', 'Cubre Faros', 'Foto tapa cubre faros 2'),
(9,3, 'cubreFaros3.jpeg', 'Cubre Faros', 'Foto tapa cubre faros 3'),
(10,4, 'trofeo1.jpg', 'Trofeo', 'Foto trofeo 1'),
(11,4, 'trofeo2.jpg', 'Trofeo', 'Foto trofeo 2'),
(12,4, 'trofeo3.jpg', 'Trofeo', 'Foto trofeo 3'),
(13,4, 'trofeo4.jpg', 'Trofeo', 'Foto trofeo 4'),
(14,4, 'trofeo5.jpg', 'Trofeo', 'Foto trofeo 5'),
(15,4, 'trofeo6.jpg', 'Trofeo', 'Foto trofeo 6'),
(16,4, 'trofeo7.jpg', 'Trofeo', 'Foto trofeo 7'),
(17,4, 'trofeo8.jpg', 'Trofeo', 'Foto trofeo 8'),
(18,4, 'trofeo9.jpg', 'Trofeo', 'Foto trofeo 9'),
(19,4, 'trofeo10.jpeg', 'Trofeo', 'Foto trofeo 10'),
(20,5, 'reconocimiento1.jpg', 'Reconocimiento Laser', 'Foto reconocimiento grabado laser 1'),
(21,5, 'reconocimiento2.jpg', 'Reconocimiento Laser', 'Foto reconocimiento grabado laser 2'),
(22,5, 'reconocimiento3.jpg', 'Reconocimiento Laser', 'Foto reconocimiento grabado laser 3'),
(23,6, 'miniatura1.jpeg', 'Miniatura y Warhammer', 'Foto miniatura 1'),
(24,6, 'miniatura2.jpeg', 'Miniatura y Warhammer', 'Foto miniatura 2'),
(25,6, 'miniatura3.jpeg', 'Miniatura y Warhammer', 'Foto miniatura 3'),
(26,6, 'miniatura4.jpeg', 'Miniatura y Warhammer', 'Foto miniatura 4'),
(27,7, 'adornosNavidad1.jpeg', 'Adorno Navidad', 'Foto adorno Navidad 1'),
(28,7, 'adornosNavidad2.jpeg', 'Adorno Navidad', 'Foto adorno Navidad 2'),
(29,7, 'adornosNavidad3.jpeg', 'Adorno Navidad', 'Foto adorno Navidad 3'),
(30,8, 'lamparaCubo1.jpeg', 'Lámpara Cubo', 'Foto lámpara cubo 1'),
(31,8, 'lamparaCubo2.jpeg', 'Lámpara Cubo', 'Foto lámpara cubo 2'),
(32,8, 'lamparaCubo3.jpeg', 'Lámpara Cubo', 'Foto lámpara cubo 3');

CREATE TABLE IF NOT EXISTS `lineaspedido` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idpedido` int(100) DEFAULT NULL,
  `idproducto` int(100) DEFAULT NULL,
  `unidades` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idcliente` int(100) DEFAULT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

alter table pedidos add CONSTRAINT fk_ped_idc FOREIGN KEY (`idcliente`) REFERENCES clientes(`id`);
alter table imagenesproductos add CONSTRAINT fk_ima_idp FOREIGN KEY (`idproducto`) REFERENCES productos(`id`);
alter table lineaspedido add CONSTRAINT fk_lin_idp FOREIGN KEY (`idpedido`) REFERENCES pedidos(`id`);
alter table lineaspedido add CONSTRAINT fk_lin_idpr FOREIGN KEY (`idproducto`) REFERENCES productos(`id`);


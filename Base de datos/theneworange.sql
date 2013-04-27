-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-04-2013 a las 15:57:57
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `theneworange`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `name`, `active`) VALUES
(1, 'LG', 1),
(2, 'Mabe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `url_image` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_product_tbl_brand_idx` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `brand_id`, `name`, `price`, `description`, `amount`, `url_image`, `active`) VALUES
(1, 1, 'Plancha X100', '200.00', 'Una plancha que calienta a 2000 revoluciones por minuto capaz de generar tanto calor como la corona solar.', 20, 'imagenes/5.png', 1),
(2, 1, 'Plancha Mabe d340', '500.00', 'Plancha electrica.', 0, 'imagenes/2.png', 1),
(3, 2, 'Estufa', '2000.00', 'Una estufa', 2, 'imagenes/3.png', 1),
(4, 1, 'Super Plancha ', '450.00', 'Super plancha XLZ', 5, 'imagenes/6.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `priority` int(11) NOT NULL,
  `url_initial` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `priority`, `url_initial`, `active`) VALUES
(1, 'Administrador', 5, 'admin_panel.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sale`
--

CREATE TABLE IF NOT EXISTS `tbl_sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_sale_tbl_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sale_product`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_product` (
  `sale_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  KEY `fk_tbl_sale_product_tbl_sale_idx` (`sale_id`),
  KEY `fk_tbl_sale_product_tbl_product_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `town` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `telephone_number` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_user_tbl_role_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `role_id`, `user`, `password`, `name`, `last_name`, `email`, `town`, `address`, `telephone_number`, `active`) VALUES
(2, 1, 'said', 'dawn', 'Adrian Said', 'Dawn Rodriguez', 'said_dara@hotmail.com', 'Merida', 'calle 20', '9992466242', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_tbl_product_tbl_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD CONSTRAINT `fk_tbl_sale_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_sale_product`
--
ALTER TABLE `tbl_sale_product`
  ADD CONSTRAINT `fk_tbl_sale_product_tbl_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_sale_product_tbl_sale` FOREIGN KEY (`sale_id`) REFERENCES `tbl_sale` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_tbl_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

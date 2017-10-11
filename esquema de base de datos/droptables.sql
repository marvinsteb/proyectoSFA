
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP TABLE IF EXISTS `proyectosfa`.`serie` ;
DROP TABLE IF EXISTS `proyectosfa`.`cliente` ;
DROP TABLE IF EXISTS `proyectosfa`.`vendedor` ;
DROP TABLE IF EXISTS `proyectosfa`.`nota_credito` ;
DROP TABLE IF EXISTS `proyectosfa`.`categoria` ;
DROP TABLE IF EXISTS `proyectosfa`.`inventario` ;
DROP TABLE IF EXISTS `proyectosfa`.`almacen` ;
DROP TABLE IF EXISTS `proyectosfa`.`nc_detalle` ;
DROP TABLE IF EXISTS `proyectosfa`.`factura` ;
DROP TABLE IF EXISTS `proyectosfa`.`fac_detalle` ;
DROP TABLE IF EXISTS `proyectosfa`.`producto_almacen` ;
DROP TABLE IF EXISTS `proyectosfa`.`pago_recibido` ;
DROP TABLE IF EXISTS `proyectosfa`.`pago_detalle` ;
DROP TABLE IF EXISTS `proyectosfa`.`combustible` ;
DROP TABLE IF EXISTS `proyectosfa`.`marca` ;
DROP TABLE IF EXISTS `proyectosfa`.`color` ;
DROP TABLE IF EXISTS `proyectosfa`.`vehiculo` ;
DROP TABLE IF EXISTS `proyectosfa`.`modelo` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

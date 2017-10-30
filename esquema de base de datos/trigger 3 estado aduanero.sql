-- DROP TRIGGER  vehiculoaduanerostatus;
DELIMITER |
CREATE TRIGGER vehiculoaduanerostatus BEFORE INSERT ON aduaneroe
FOR EACH ROW BEGIN
    update vehiculo 
    set 
    vehiculo.estado = 4,
    vehiculo.costo = vehiculo.costo + new.total
    where vehiculo.idvehiculo = new.idvehiculo;
END
|
DELIMITER ;
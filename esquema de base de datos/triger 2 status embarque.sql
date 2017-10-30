-- DROP TRIGGER  vehiculoembarquestatus;
DELIMITER |
CREATE TRIGGER vehiculoembarquestatus BEFORE INSERT ON embarque
FOR EACH ROW BEGIN
    update vehiculo 
    set 
    vehiculo.estado = 3,
    vehiculo.costo = vehiculo.costo + new.total
    where vehiculo.idvehiculo = new.idvehiculo;
END
|
DELIMITER ;


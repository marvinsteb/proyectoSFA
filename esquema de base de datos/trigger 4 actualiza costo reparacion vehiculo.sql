DROP TRIGGER  vehiculoreparacionstatus ;
DELIMITER |
CREATE TRIGGER vehiculoreparacionstatus BEFORE INSERT ON reparacion_detalle
FOR EACH ROW BEGIN
    update vehiculo 
    set 
    vehiculo.estado = 5,
    vehiculo.costo = vehiculo.costo + (new.cantidad * new.costo)
    where vehiculo.idvehiculo = new.idvehiculo;
END
|
DELIMITER ;
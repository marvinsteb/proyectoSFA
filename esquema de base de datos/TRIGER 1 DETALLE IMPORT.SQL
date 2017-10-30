DROP TRIGGER  vehiculocompradostatus;
DELIMITER |
CREATE TRIGGER vehiculocompradostatus BEFORE INSERT ON facturaimportdetalle
FOR EACH ROW BEGIN
    update vehiculo 
    set 
    vehiculo.estado = 2,
    vehiculo.costo = vehiculo.costo + new.precio
    where vehiculo.idvehiculo = new.id_vehiculo;
END
|
DELIMITER ;

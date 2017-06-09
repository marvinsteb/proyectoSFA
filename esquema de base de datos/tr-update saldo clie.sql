DELIMITER |
CREATE TRIGGER saldoCLie BEFORE INSERT ON fac_detalle
FOR EACH ROW BEGIN
    set @saldo = 0 ;
    select sum((cantidad * precio) * impuesto) into @saldo from fac_detalle where idfactura = old.numero_fac;
	update factura set total = @saldo where idfactura = old.numero_fac;
    update cliente set saldo = saldo + @saldo where idcliente = old.cliente_id;
END
|
DELIMITER ;

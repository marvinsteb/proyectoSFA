
LOCK TABLES factura WRITE;

DROP TRIGGER numerofac;
 
DELIMITER |
CREATE TRIGGER numerofac BEFORE INSERT ON factura
  FOR EACH ROW BEGIN
    set @numDocSig = 0 ;
    
	select sr.documento_siguiente into @numDocSig from serie sr where sr.idserie = NEW.codigo_serie;
    
	set NEW.numero_fac = @numDocSig;
    
    set @numDocSig = @numDocSig + 1;
    update serie set documento_siguiente = documento_siguiente +1
    where idserie = NEW.codigo_serie;
  END
|
DELIMITER ;
UNLOCK TABLES;
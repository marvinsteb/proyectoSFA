alter VIEW  costovehiculo as
select '1' as  orden ,fd.id_vehiculo,'Factura de importación' as doc,fe.nofactura,'Costo del vehículo' as descripciontotal,sum(fd.precio) as total from facturaimport fe
inner join facturaimportdetalle fd on fd.idfacturaimport = fe.idfactura
inner join vehiculo vh on vh.idvehiculo = fd.id_vehiculo
group by fe.nofactura,fd.id_vehiculo
union all 
select '2' as orden, idvehiculo,'Embarque' as doc,embarque.idembarque,'Flete Maritimo',fletemaritimo from embarque 
union all 
select '3' as orden, idvehiculo,'Embarque' as doc,embarque.idembarque,'Transporte Interno',transporteinterno from embarque 
union all 
select '4' as orden, idvehiculo,'Embarque' as doc,embarque.idembarque,'Valor de documentación',valordocumentacion from embarque 
union all 
select '4' as orden, idvehiculo,'Embarque' as doc,embarque.idembarque,'Cargos del Servicio',cargoservicio from embarque 



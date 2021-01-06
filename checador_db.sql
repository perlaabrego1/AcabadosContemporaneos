create database checador_db;
use checador_db;

create table Empleados(
idEmpleado varchar(30) primary key,
Nombre varchar(50),
ApellidoPat varchar(30),
ApellidoMat varchar(30),
CURP varchar(30),
RFC varchar(30),
NSS varchar(30),
Puesto varchar(100));

create table Listas(
NoFolio int primary key auto_increment,
periodoSemana int unique);

create table ListaEmp(
NoFolio int not null,
idEmpleado varchar(30),
fechaAsist date,
hora time,
dia1 int,
dia2 int,
dia3 int,
dia4 int,
dia5 int,
dia6 int,
hrC_dia1 datetime,
hrC_dia2 datetime,
hrC_dia3 datetime,
hrC_dia4 datetime,
hrC_dia5 datetime,
hrC_dia6 datetime,
hrsTrabajadas_dia1 int,
hrsTrabajadas_dia2 int,
hrsTrabajadas_dia3 int,
hrsTrabajadas_dia4 int,
hrsTrabajadas_dia5 int,
hrsTrabajadas_dia6 int,
foreign key(NoFolio) references Listas(NoFolio),
foreign key(idEmpleado) references Empleados(idEmpleado),
primary key(NoFolio, idEmpleado));

create table _Login(
idEmpleado varchar(30),
contraseña varchar(20),
foreign key(idEmpleado) references Empleados(idEmpleado));

/*Pruebas*/
/*Inserciones*/
/*Empleados y login */
/*Procedimiento para dar de alta al empleado y al mismo tiempo
se genera su login con su id y su curp como contraseña*/
DELIMITER // 
CREATE PROCEDURE altaEmpleado(idEmpleado varchar(30),
Nombre varchar(50),
ApellidoPat varchar(30),
ApellidoMat varchar(30),
CURP varchar(30),
RFC varchar(30),
NSS varchar(30),
Puesto varchar(30)) 
BEGIN 
	insert into Empleados values (idEmpleado, Nombre, ApellidoPat, ApellidoMat, CURP, RFC, NSS, Puesto);
    insert into _Login values (idEmpleado, CURP);
END; // 
DELIMITER ; 
call altaEmpleado ('100', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Empleado de piso');/*Se debe mandar a llamar al procedimiento para dar de alta al empleado */
call altaEmpleado ('110', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Empleado de piso');
call altaEmpleado ('120', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Empleado de piso');
call altaEmpleado ('130', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Chofer');
call altaEmpleado ('140', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Almacenista');
call altaEmpleado ('150', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Chofer');
call altaEmpleado ('200', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Almacenista');
/*Listas*/
/*procedimiento que al generar una lista, inserta a todos los empleados existentes en la base de datos*/
DELIMITER // 
CREATE PROCEDURE generarListas() 
BEGIN 
	insert into Listas  (periodoSemana) values (week(curdate()));
    SET @id = LAST_INSERT_ID();
    insert into listaemp (NoFolio, idEmpleado)
    select @id, Empleados.idEmpleado from Empleados;
    update listaemp set dia1 = 0, dia2 = 0, dia3 = 0, dia4 = 0, dia5 = 0, dia6 = 0, hrsTrabajadas_dia1 = 0, hrsTrabajadas_dia2 = 0, hrsTrabajadas_dia3 = 0, hrsTrabajadas_dia4 = 0, hrsTrabajadas_dia5 = 0, hrsTrabajadas_dia6 = 0;
END; // 
DELIMITER;
call generarListas();/*se debe mandar a llamar al procedimiento para generarla*/

/*consulta de los empleados en la lista por folio de la lista*/
DELIMITER // 
CREATE PROCEDURE consultaListaEmp() 
BEGIN 
	set @maxfolio = (select max(NoFolio) from ListaEmp);
	select idEmpleado from ListaEmp where NoFolio = @maxfolio;
END; // 
DELIMITER ; 
call consultaListaEmp();
/*Cosultar checadas*/
DELIMITER // 
CREATE PROCEDURE consultarChecada(id varchar(30)) 
BEGIN 
	set @folio = (select max(NoFolio) as 'foliomax' from listaemp);
	select idEmpleado, fechaAsist, dia1, dia2, dia3, dia4, dia5, dia6, hora from ListaEmp
	where (NoFolio = @folio and idEmpleado = id);
END; // 
DELIMITER ; 
/*Diferencia de horas en minutos*/   
DELIMITER // 
CREATE PROCEDURE diferencia(anterior varchar(30)) 
BEGIN 
    SELECT TIMESTAMPDIFF(MINUTE,anterior, CURRENT_TIMESTAMP) as 'Diferencia';
END; // 
DELIMITER ; 


/*Pruebas con horarios*/
DELIMITER // 
CREATE PROCEDURE _diferencia(anterior varchar(30), posterior varchar(30)) 
BEGIN 
    SELECT TIMESTAMPDIFF(MINUTE,anterior, posterior) as 'Diferencia';
END; // 
DELIMITER ; 

update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
dia2 = 1, hrC_dia2 = "2021-01-05 09:00:00" where idEmpleado = 100 and NoFolio = 15;

update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
dia2 = 3, hrC_dia2 = "2021-01-05 12:00:00" where idEmpleado = 100 and NoFolio = 15;
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
Puesto varchar(30));

create table Listas(
NoFolio int primary key auto_increment,
periodoSemana int);

create table ListaEmp(
NoFolio int not null,
idEmpleado varchar(30),
fechaAsist date,
cantChecadas int,
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
/*Se debe mandar a llamar al procedimiento para dar de alta al empleado */
call altaEmpleado ('100', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Puesto');
call altaEmpleado ('110', 'Nombre', 'ApPat', 'ApMat', 'CURP', 'RFC', 'NSS', 'Puesto');
/*Listas*/
insert into Listas (periodoSemana) values ( week(curdate()) ); /*NoFolio tiene valor autoincrementable, unicamente se inserta el númerode semana del año*/
/*ListasEmpleados*/
insert into ListaEmp values (1, '100', null, 0);/*falta detalle, se debe obtener ultimo NoFolio de la tabla Listas, e insertarlo en la Tabla ListaEmp*/

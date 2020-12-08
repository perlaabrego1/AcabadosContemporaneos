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
NoFolio int primary key,
Periodo varchar(30));

create table ListaEmp(
NoFolio int not null,
idEmpleado varchar(30),
fechaAsist date,
cantChecadas int,
foreign key(NoFolio) references Listas(NoFolio),
foreign key(idEmpleado) references Empleados(idEmpleado));

create table _Login(
idEmpleado varchar(30),
contraseña varchar(20),
foreign key(NoFolio) references Listas(NoFolio));
use kundenportal;

drop table if exists TVideos;
create table TVideos(
	VidNummer int unsigned primary key auto_increment,
    VidTitel varchar(40) not null,
    VidDauer time not null,
    VidKategorie varchar(40),
    VidJahr year not null,
    VidFreiAb smallint unsigned not null,
    VidPreisProTag decimal (4,2) not null,
    VidEinkaufsPreis decimal (5,2) not null,
    VidLagerbestand int unsigned not null
);
alter table TVideos auto_increment = 1000;

drop table if exists TAusleihen;
create table TAusleihen (
	AusId int unsigned primary key auto_increment,
    AusVon date not null,
    AusBis date not null,
    VidNummer int unsigned not null,
    KunNummer int unsigned not null
);
alter table TAusleihen auto_increment = 1000;

drop table if exists TKunden;
create table TKunden (
	KunNummer int unsigned primary key auto_increment,
    KunAnrede enum('Herr', 'Frau', 'Dr', 'Divers', 'Severin') not null,
    KunVorname varchar(40) not null,
    KunNachname varchar(40) not null,
    KunStrasse varchar(50) not null,
    KunGebDatum date not null,
    KunTelefon char(16),
    OrtONRP int(5) not null
);
alter table TKunden auto_increment=1000;

drop table if exists TOrte;
create table TOrte (
  OrtONRP int(5) unsigned primary key,
  OrtPLZ char(4) not  null,
  OrtName varchar(30) not null
);

show tables;
describe TAusleihen;
describe TKunden;
describe TOrte;
describe TVideos;

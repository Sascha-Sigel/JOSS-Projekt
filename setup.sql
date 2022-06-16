/*
 * Title: JOSS-Projekt Setup-Script in mySQL
 * Author: Sascha Sigel
 * Version: 1.2
 * Date: 16.06.2022
*/

create database if not exists kundenportal;
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
    AusBis date,
    VidNummer int unsigned not null,
    KunNummer int unsigned not null
);
alter table TAusleihen auto_increment = 1000;

drop table if exists TKunden;
create table TKunden (
	KunNummer int unsigned primary key auto_increment,
    KunAnrede enum('Herr', 'Frau'),
    KunVorname varchar(40) not null,
    KunNachname varchar(40) not null,
    KunStrasse varchar(50) not null,
    KunEMail varchar(40) not null,
    KunGebDatum date not null,
    KunTelefon char(16) not null,
    OrtONRP int(5) not null
);
alter table TKunden auto_increment=1000;

drop table if exists TOrte;
create table TOrte (
  OrtONRP int unsigned primary key,
  OrtPLZ char(4) not  null,
  OrtName varchar(30) not null
);

insert into TVideos values(null, 'John Wick', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1);
insert into TAusleihen values(null, now(), '2022-06-23', 1000, 1000);
insert into TKunden values(null, 'Herr', 'Sascha', 'Sigel', 'Weinfelderstrasse 124b', 'sascha.sigel@stud.kftg.ch', '2004-07-06', '+41 71 411 79 15', 4893);
insert into TOrte values(4893, 8580, 'Amriswil');

-- Test if entities are connected
-- select k.KunNummer, KunVorname, KunNachname, v.VidNummer, v.VidTitel from TKunden k, TAusleihen a, TVideos v where k.KunNummer = a.KunNummer and a.VidNummer = v.VidNummer;

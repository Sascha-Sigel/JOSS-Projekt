/* ------------------------------------------------------------
setup.sql

This Script is setting up the Database for
the Kundenportal-Website from the JOSS-Project

Author: Sascha Sigel, JOSS AG
Date: 17.06.2022

History:
Version	Date		Who		Changes
2.5		23.06.22	SIG		changed to joss_kundenportal
2.4     23.06.22    SIG     added Hausnummer to TKunden
2.3		17.06.22	SIG		added test entities
2.2		17.06.22	SIG		added correct Header
2.1		17.06.22	SIG		utf8mb4 characters implemented
1.1		16.06.22	SIG		corrections from feedback of NUE
1.0		10.06.22	SIG		created
		
Copyright © 2022 JOSS AG, Zürich, Switzerland, All rights reserved.
------------------------------------------------------------ */

-- Character set to utf-8 with 4 bytes, so that emojis are implemented
create database if not exists joss_kundenportal default character set utf8mb4 collate utf8mb4_unicode_ci;
use joss_kundenportal;

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
    KunHausnummer varchar(4) not null,
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

-- Testing
insert into TVideos values(null, 'John Wick', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1);
insert into TAusleihen values(null, now(), '2022-06-23', 1000, 1000);
insert into TKunden values(null, 'Herr', 'Sascha 👾', 'Sigel', 'Weinfelderstrasse', '124b', 'sascha.sigel@stud.kftg.ch', '2004-07-06', '+41 71 411 79 15', 4893);
insert into TKunden values(null, 'Herr', 'Oliver 👽', 'Wettstein', 'Hohlgasse', '4', 'oliver.wettstein@stud.kftg.ch', '2003-03-21', '079 535 31 52', 4893);
insert into TKunden values(null, 'Frau', 'Jeannnine 🐱‍👤', 'Ziegler', 'Bannaustrasse', '10', 'jeannine.ziegler@stud.kftg.ch', '2004-05-30', '076 823 00 14', 4893);

insert into TOrte values(4893, 8580, 'Amriswil');
insert into TOrte values(4876,8570,'Weinfelden');
insert into TOrte values(4836,'8532','Weiningen');

select k.KunNummer, KunVorname, KunNachname, v.VidNummer, v.VidTitel from TKunden k, TAusleihen a, TVideos v where k.KunNummer = a.KunNummer and a.VidNummer = v.VidNummer;

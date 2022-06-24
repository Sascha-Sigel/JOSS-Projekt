create database if not exists joss_kundenportal default character set utf8mb4 collate utf8mb4_unicode_ci;
use joss_kundenportal;
create user 'jossAdmin'@'i-kf.ch' identified by 'zi_23Dt9!y';
grant all privileges on joss_kundenportal.* to 'jossAdmin'@'i-kf.ch';

use joss_kundenportal;
RENAME USER jossAdmin TO videothekar;
ALTER USER 'videothekar'@'i-kf.ch' IDENTIFIED BY '!rektUZ7';
RENAME TABLE joss_kundenportal TO Videothek_JOSS_DB;
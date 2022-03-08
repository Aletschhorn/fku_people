#
# Table structure for table 'tx_fkupeople_domain_model_person'
#
CREATE TABLE tx_fkupeople_domain_model_person (

	uid int(11) DEFAULT '0' NOT NULL,
	pid int(2) DEFAULT '0' NOT NULL,

	name varchar(30) DEFAULT  NULL,
	firstname varchar(30) DEFAULT  NULL,
	lastname varchar(30) DEFAULT NULL,
	address varchar(30) DEFAULT NULL,
	housenumber varchar(10) DEFAULT NULL,
	addressadd varchar(30) DEFAULT NULL,
	zipcode varchar(8) DEFAULT NULL,
	city varchar(30) DEFAULT NULL,
	phone varchar(25) DEFAULT NULL,
	mobile varchar(25) DEFAULT NULL,
	email varchar(40) DEFAULT NULL,
	dateofbirth datetime DEFAULT NULL,
	memberstatus int(1) DEFAULT '0' NOT NULL,
	child smallint(6) DEFAULT NULL,
	duty bigint(21) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_fkupeople_domain_model_team'
#
CREATE TABLE tx_fkupeople_domain_model_team (

	uid int(11) DEFAULT '0' NOT NULL,
	pid int(2) DEFAULT '0' NOT NULL,

	title varchar(50) DEFAULT NULL,
	hidden int(1) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_fkupeople_domain_model_subteam'
#
CREATE TABLE tx_fkupeople_domain_model_subteam (

	uid bigint(20) DEFAULT '0' NOT NULL,
	pid bigint(20) DEFAULT '0' NOT NULL,

	title varchar(103) DEFAULT NULL,
	team int(11) DEFAULT NULL,
);

#
# Table structure for table 'tx_fkupeople_person_subteam_mm'
#
CREATE TABLE tx_fkupeople_person_subteam_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign bigint(12) DEFAULT '0' NOT NULL,
	sorting int(1) DEFAULT '0' NOT NULL,
	sorting_foreign int(1) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_fkupeople_domain_model_birthday'
#
CREATE TABLE tx_fkupeople_domain_model_birthday (
	uid int(11) DEFAULT '0' NOT NULL,
	pid int(2) DEFAULT '0' NOT NULL,
	nachname varchar(30) DEFAULT NULL,
	vorname varchar(30) DEFAULT NULL,
	geburtsdatum varchar(6) DEFAULT NULL,
	mitglied tinyint(1) DEFAULT NULL,
	jahrgang int(4) DEFAULT NULL,
	pers_alter int(5) DEFAULT NULL,
);

#
# Table structure for table 'tx_fkupeople_domain_model_extern'
#
CREATE TABLE tx_fkupeople_domain_model_extern (

	uid int(11) NOT NULL auto_increment,
	pid int(2) DEFAULT '0' NOT NULL,

	firstname varchar(30) DEFAULT  NULL,
	lastname varchar(30) DEFAULT NULL,
	phone varchar(25) DEFAULT NULL,
	mobile varchar(25) DEFAULT NULL,
	email varchar(40) DEFAULT NULL,
	
	t3ver_state int(1) DEFAULT '0' NOT NULL,
	t3ver_stage int(1) DEFAULT '0' NOT NULL,
	t3ver_wsid int(1) DEFAULT '0' NOT NULL,
	t3ver_id int(1) DEFAULT '0' NOT NULL,
	t3ver_oid int(1) DEFAULT '0' NOT NULL,
	t3ver_count int(1) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);


#
# Table structure for table 'tx_fkupeople_domain_model_notification'
#
CREATE TABLE tx_fkupeople_domain_model_notification (

	uid int(11) NOT NULL auto_increment,
	pid int(2) DEFAULT '0' NOT NULL,

	rule int(11) DEFAULT '0' NOT NULL,
	days int(11) DEFAULT '0' NOT NULL,
	user int(11) DEFAULT '0' NOT NULL,
	timing int(1) DEFAULT '0' NOT NULL,
	
	t3ver_state int(1) DEFAULT '0' NOT NULL,
	t3ver_stage int(1) DEFAULT '0' NOT NULL,
	t3ver_wsid int(1) DEFAULT '0' NOT NULL,
	t3ver_id int(1) DEFAULT '0' NOT NULL,
	t3ver_oid int(1) DEFAULT '0' NOT NULL,
	t3ver_count int(1) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);


#
# Table structure for table 'tx_fkupeople_domain_model_notificationrule'
#
CREATE TABLE tx_fkupeople_domain_model_notificationrule (

	uid int(11) NOT NULL auto_increment,
	pid int(2) DEFAULT '0' NOT NULL,

	extension varchar(255) DEFAULT NULL,
	nid int(11) DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT NULL,
	message varchar(255) DEFAULT NULL,
	timing_now int(1) DEFAULT '0' NOT NULL,
	timing_day int(1) DEFAULT '0' NOT NULL,
	timing_week int(1) DEFAULT '0' NOT NULL,
	usergroup int(11) DEFAULT '0' NOT NULL,
	category int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state int(1) DEFAULT '0' NOT NULL,
	t3ver_stage int(1) DEFAULT '0' NOT NULL,
	t3ver_wsid int(1) DEFAULT '0' NOT NULL,
	t3ver_id int(1) DEFAULT '0' NOT NULL,
	t3ver_oid int(1) DEFAULT '0' NOT NULL,
	t3ver_count int(1) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	UNIQUE KEY `extension_nid` (`extension`,`nid`),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);


##
# Extend table 'fe_users'
#
CREATE TABLE fe_users (
	tx_fkupeople_fkudbid int(11) unsigned DEFAULT '0' NOT NULL,
	tx_fkupeople_fkudbsync datetime DEFAULT '0000-00-00 00:00:00',
	tx_fkupeople_planningcal varchar(255) DEFAULT '' NOT NULL,
	tx_fkupeople_planning_alarm int(1) unsigned DEFAULT '0' NOT NULL,
	tx_fkupeople_notification_hour int(11) unsigned DEFAULT '0' NOT NULL,
	tx_fkupeople_notification_weekday int(11) unsigned DEFAULT '0' NOT NULL,
	tx_fkupeople_notification_weekdayhour int(11) unsigned DEFAULT '0' NOT NULL,
	tx_fkupeople_notification_cacheday text NOT NULL,
	tx_fkupeople_notification_cacheweek text NOT NULL,
);

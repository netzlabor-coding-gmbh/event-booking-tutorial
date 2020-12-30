#
# Table structure for table 'tx_coeventbooking_domain_model_event'
#
CREATE TABLE tx_coeventbooking_domain_model_event (

	title varchar(255) DEFAULT '' NOT NULL,
	description text,
	date datetime DEFAULT NULL,
	ticket_amount int(11) DEFAULT '0' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	slug varchar(255) DEFAULT '' NOT NULL,
	place int(11) unsigned DEFAULT '0',
	speaker int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_coeventbooking_domain_model_place'
#
CREATE TABLE tx_coeventbooking_domain_model_place (

	name varchar(255) DEFAULT '' NOT NULL,
	address text

);

#
# Table structure for table 'tx_coeventbooking_domain_model_speaker'
#
CREATE TABLE tx_coeventbooking_domain_model_speaker (

	name varchar(255) DEFAULT '' NOT NULL,
	phone varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_coeventbooking_domain_model_booking'
#
CREATE TABLE tx_coeventbooking_domain_model_booking (

	number varchar(255) DEFAULT '' NOT NULL,
	gender varchar(255) DEFAULT '' NOT NULL,
	first_name varchar(255) DEFAULT '' NOT NULL,
	last_name varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	dsgvo smallint(5) unsigned DEFAULT '0' NOT NULL,
	event int(11) unsigned DEFAULT '0'

);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
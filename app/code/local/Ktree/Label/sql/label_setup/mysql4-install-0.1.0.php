<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getTable('label');

$installer->run("
    create table IF NOT EXISTS {$table} (
        label_id int(11) unsigned not null auto_increment,
        label_text varchar(50) not null default '',
		label_productskus varchar(50) not null default '',
        label_img varchar(128) default NULL,
        label_position varchar(128) NOT NULL default '',
		store_id varchar(10) NOT NULL default '',
        PRIMARY KEY(label_id)
    ) engine=InnoDB default charset=utf8;
");

$installer->endSetup();

<?php

use yii\db\Migration;
use yii\db\Schema;

class m170808_204820_init_db extends Migration
{
    public function safeUp()
    {
		$this->createTable('project', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING,
			'description' => Schema::TYPE_TEXT,
		]);
		
		$this->createTable('scan', [
			'id' => Schema::TYPE_PK,
			'project_id' => Schema::TYPE_INTEGER,
			'tool' => Schema::TYPE_STRING,
		    'version' => Schema::TYPE_STRING,
		    'scan_date' => Schema::TYPE_DATETIME,
		    'base_url' => Schema::TYPE_STRING,
		    'host' => Schema::TYPE_STRING,
		    'port' => Schema::TYPE_STRING,
		    'reviewed_by' => Schema::TYPE_STRING,
		    'review_completed' => Schema::TYPE_DATETIME,
		]);
		
		$this->createIndex('idx_scan_project', 'scan', ['project_id']);
		
		//$this->addForeignKey('fk_scan_project', 'scan', ['project_id'], 'project', ['id'], 'CASCADE', 'CASCADE');
		
		$this->createTable('alert', [
		    'id' => Schema::TYPE_PK,
			'scan_id' => Schema::TYPE_INTEGER,
			'test_id' => Schema::TYPE_INTEGER,
		    'alert' => Schema::TYPE_STRING,
			'name' => Schema::TYPE_STRING,
			'riskcode' => Schema::TYPE_STRING,
			'confidence' => Schema::TYPE_STRING,
			'riskdesc' => Schema::TYPE_TEXT,
			'description' => Schema::TYPE_TEXT,
		    'count' => Schema::TYPE_INTEGER,
		    'solution' => Schema::TYPE_TEXT,
		    'reference' => Schema::TYPE_STRING,
		    'cweid' => Schema::TYPE_INTEGER,
		    'wascid' => Schema::TYPE_INTEGER,
		    'sourceid' => Schema::TYPE_INTEGER,
			'review_status' => Schema::TYPE_STRING,
			'reviewed_by' => Schema::TYPE_STRING,
			'review_completed' => Schema::TYPE_DATETIME,
		]);

		$this->createIndex('idx_alert_scan', 'alert', ['scan_id']);
		
		//$this->addForeignKey('fk_alert_scan', 'alert', ['scan_id'], 'scan', ['id'], 'CASCADE', 'CASCADE');
		
		$this->createTable('instance', [
			'id' => Schema::TYPE_BIGPK,
		    'alert_id' => Schema::TYPE_INTEGER,
			'uri' => Schema::TYPE_TEXT,
			'method' => Schema::TYPE_STRING,
			'parameter' => Schema::TYPE_STRING,
			'evidence' => Schema::TYPE_TEXT,
			'attack' => Schema::TYPE_TEXT,
			'review_status' => Schema::TYPE_STRING,
			'reviewed_by' => Schema::TYPE_STRING,
			'review_completed' => Schema::TYPE_DATETIME,
		]);
		
		$this->createIndex('idx_instance_alert', 'instance', ['alert_id']);
		
    	
		//$this->addForeignKey('fk_instance_alert', 'instance', ['alert_id'], 'alert', ['id'], 'CASCADE', 'CASCADE');
		
		$this->createTable('note', [
			'id' => Schema::TYPE_BIGPK,
			'scan_id' => Schema::TYPE_INTEGER,
			'alert_id' => Schema::TYPE_INTEGER,
			'instance_id' => Schema::TYPE_INTEGER,
			'text' => Schema::TYPE_TEXT,
			'created_by' => Schema::TYPE_STRING,
			'created_date' => Schema::TYPE_DATETIME,
			'updated_by' => Schema::TYPE_STRING,
			'updated_date' => Schema::TYPE_DATETIME,
		]);
		
		$this->createIndex('idx_note_scan', 'note', ['scan_id']);
		$this->createIndex('idx_note_alert', 'note', ['alert_id']);
		$this->createIndex('idx_note_instance', 'note', ['instance_id']);
		
		//$this->addForeignKey('fk_note_scan', 'note', ['scan_id'], 'scan', ['id'], 'CASCADE', 'CASCADE');
		//$this->addForeignKey('fk_note_alert', 'note', ['alert_id'], 'alert', ['id'], 'CASCADE', 'CASCADE');
		//$this->addForeignKey('fk_note_instance', 'note', ['instance_id'], 'instance', ['id'], 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {	
    	foreach (['note' , 'instance', 'alert', 'scan', 'project'] as $table) {
			$this->dropTable($table);
    	}
    }
}

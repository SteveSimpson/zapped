<?php

use yii\db\Migration;
use yii\db\Schema;

class m171127_232855_make_reference_longer extends Migration
{
    public function safeUp()
    {
        $this->dropIndex('idx_alert_scan', 'alert');

        $this->renameTable('alert', 'old_alert');

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
            'reference' => Schema::TYPE_TEXT,
            'cweid' => Schema::TYPE_INTEGER,
            'wascid' => Schema::TYPE_INTEGER,
            'sourceid' => Schema::TYPE_INTEGER,
            'review_status' => Schema::TYPE_STRING,
            'reviewed_by' => Schema::TYPE_STRING,
            'review_completed' => Schema::TYPE_DATETIME,
        ]);

        $this->createIndex('idx_alert_scan', 'alert', ['scan_id']);

        $this->execute('INSERT INTO alert SELECT * from old_alert');

        $this->dropTable('old_alert');
    }

    public function safeDown()
    {
        // don't migrate down
    }
}

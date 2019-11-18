<?php

use yii\db\Migration;

class m191110_143314_011_create_table_questions extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
            'Question' => $this->string(),
            'Answer' => $this->string(),
            'test_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-Questions-test_id', '{{%questions}}', 'test_id');
        $this->addForeignKey('fk-Questions-test_id', '{{%questions}}', 'test_id', '{{%test}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%questions}}');
    }
}

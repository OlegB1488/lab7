<?php

use yii\db\Migration;

class m191110_143314_003_create_table_items extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'Description' => $this->text(),
            'author' => $this->text(),
            'Count' => $this->integer(),
            'category_id' => $this->integer()->defaultValue('1'),
        ], $tableOptions);

        $this->createIndex('idx-Items-category_id', '{{%items}}', 'category_id');
        $this->addForeignKey('fk-Items-category_id', '{{%items}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%items}}');
    }
}

<?php

use yii\db\Migration;

class m191110_143314_005_create_table_test extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'Name' => $this->string(),
            'Description' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%test}}');
    }
}

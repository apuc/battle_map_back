<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%map}}`.
 */
class m220419_091122_create_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%map}}', [
            'id' => $this->primaryKey(),
            'json_data' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%map}}');
    }
}

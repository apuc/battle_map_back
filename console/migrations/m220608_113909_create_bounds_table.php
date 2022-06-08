<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bounds}}`.
 */
class m220608_113909_create_bounds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bounds}}', [
            'id' => $this->primaryKey(),
            'bounds' => $this->string(),
            'name' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bounds}}');
    }
}

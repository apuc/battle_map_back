<?php

use yii\db\Migration;

/**
 * Class m220503_114649_add_column_circle_data_to_map_table
 */
class m220503_114649_add_column_circle_data_to_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('map', 'circle_data', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('map', 'circle_data');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220503_114649_add_column_circle_data_to_map_table cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m220425_184045_add_column_date_to_map_table
 */
class m220425_184045_add_column_date_to_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('map', 'date', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('map', 'date');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220425_184045_add_column_date_to_map_table cannot be reverted.\n";

        return false;
    }
    */
}

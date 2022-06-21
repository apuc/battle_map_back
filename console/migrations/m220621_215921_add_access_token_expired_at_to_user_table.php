<?php

use yii\db\Migration;

/**
 * Class m220621_215921_add_access_token_expired_at_to_user_table
 */
class m220621_215921_add_access_token_expired_at_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'access_token_expired_at', $this->dateTime()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'access_token_expired_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220621_215921_add_access_token_expired_at_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}

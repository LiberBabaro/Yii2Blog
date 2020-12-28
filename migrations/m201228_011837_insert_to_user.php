<?php

use yii\db\Migration;

/**
 * Class m201228_011837_insert_to_user
 */
class m201228_011837_insert_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%user}}',
            [
                'id',
                'name',
                'email',
                'password',
                'isAdmin'

            ],
            [
                [
                    1,
                    'admin',
                    'admin@admin.ru',
                    'admin',
                    1
                ],
                [
                    2,
                    'Unauthorized User',
                    null,
                    null,
                    0
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201228_011837_insert_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201228_011837_insert_to_user cannot be reverted.\n";

        return false;
    }
    */
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bounds".
 *
 * @property int $id
 * @property string|null $bounds
 * @property string|null $name
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Bounds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bounds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['bounds', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bounds' => 'Bounds',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

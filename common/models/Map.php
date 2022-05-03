<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "map".
 *
 * @property int $id
 * @property string|null $json_data
 * @property string|null $circle_data
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $status
 * @property string|null $date
 */
class Map extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'map';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['json_data', 'circle_data'], 'string'],
            [['created_at', 'updated_at', 'date'], 'safe'],
            [['json_data', 'date'], 'required'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'json_data' => 'Json Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
}

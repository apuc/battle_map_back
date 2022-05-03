<?php

namespace frontend\modules\api\models;

use Yii;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 * This is the model class for table "map".
 *
 * @property int $id
 * @property string|null $json_data
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class Map extends \common\models\Map implements Linkable
{
    public function fields()
    {
        return [
            'date' => function () {
                return Yii::$app->formatter->asDate($this->date, 'yyyy-MM-dd');
            },
            'json_data',
            'circle_data'
        ];
    }

    public function extraFields()
    {
        return [

        ];
    }

    public function getLinks(): array
    {
        return [
            'self' => Url::to(['map/map', 'date' => Yii::$app->formatter->asDate($this->date, 'yyyy-MM-dd')], true),
        ];
    }
}

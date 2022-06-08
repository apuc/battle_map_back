<?php

namespace frontend\modules\api\models;

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
class Bounds extends \common\models\Bounds
{
    public function fields()
    {
        return [
            'name',
            'bounds',
        ];
    }

    public function extraFields()
    {
        return [

        ];
    }
}

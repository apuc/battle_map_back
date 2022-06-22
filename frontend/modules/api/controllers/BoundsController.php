<?php


namespace frontend\modules\api\controllers;


use common\services\ResponseService;
use frontend\modules\api\models\Bounds;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;


class BoundsController extends ApiController
{
    public function verbs(): array
    {
        return [
            'get-bounds' => ['GET'],
        ];
    }

    public function actionGetBounds(): array
    {
        $colors = Bounds::find()->all();

        if (!empty($colors)) {
            $response = ResponseService::successResponse(
                'Bounds list!',
                $colors
            );
        } else {
            Yii::$app->response->statusCode = 400;
            $response = ResponseService::errorResponse(
                'Bounds not found!'
            );
        }
        return $response;
    }
}
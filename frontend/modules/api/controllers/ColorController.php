<?php


namespace frontend\modules\api\controllers;


use common\services\ResponseService;
use frontend\modules\api\models\Color;
use Yii;


class ColorController extends ApiController
{
    public function verbs(): array
    {
        return [
            'get-color' => ['GET'],
            'set-color' => ['POST'],
        ];
    }

    public function actionSetColor(): array
    {
        $id = Yii::$app->request->post('id');
        $value = Yii::$app->request->post('value');
        $name = Yii::$app->request->post('name');

        if (!empty(Color::findOne($id))) {
            $colorModel = Color::findOne($id);
        } else {
            $colorModel = new Color();
        }

        if (!empty($name)) {
            $colorModel->name = $name;
        }

        $colorModel->value = $value;
        if ($colorModel->save()) {
            $response = ResponseService::successResponse(
                'Color is saved!',
                $colorModel
            );
        } else {
            Yii::$app->response->statusCode = 400;
            $response = ResponseService::errorResponse(
                $colorModel->getErrors()
            );
        }

        return $response;
    }

    public function actionGetColors(): array
    {
        $colors = Color::find()->all();

        if (!empty($colors)) {
            $response = ResponseService::successResponse(
                'Colors list!',
                $colors
            );
        } else {
            Yii::$app->response->statusCode = 400;
            $response = ResponseService::errorResponse(
                'Colors not found!'
            );
        }
        return $response;
    }
}
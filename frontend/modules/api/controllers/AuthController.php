<?php

namespace frontend\modules\api\controllers;


use common\services\ResponseService;
use frontend\modules\api\models\LoginForm;
use frontend\modules\api\models\User;
use Yii;

class AuthController extends ApiController
{
    public $modeClass = User::class;

    public function verbs(): array
    {
        return [
            'login' => ['GET'],
            'create' => ['POST'],
        ];
    }

    public function actionLogin($username, $password): array
    {
        $loginFormModel = new LoginForm();
        if ($loginFormModel->load(Yii::$app->request->get(), '') && $loginFormModel->login()) {
            $response = ResponseService::successResponse(
                'Authorization is successful!',
                User::findByUsername($loginFormModel->username)
            );
        } else {
            Yii::$app->response->statusCode = 400;
            $response = ResponseService::errorResponse(
                $loginFormModel->getErrors()
            );
        }
        return $response;
    }
}
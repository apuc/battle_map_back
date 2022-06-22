<?php


namespace frontend\modules\api\controllers;


use common\services\ResponseService;
use frontend\modules\api\models\Map;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;


class MapController extends ApiController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'class' => CompositeAuth::class,
                'authMethods' => [
                    HttpBearerAuth::class,
                ],
            ],
        ]);
    }

    public $modelClass = 'frontend\modules\api\models\Map';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'map',
    ];

    public function verbs(): array
    {
        return [
            'map' => ['GET'],
            'get-changes' => ['GET'],
            'set-map' => ['POST'],
        ];
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function actionGetChanges(): array
    {
        $dates = Map::find()->select('date')->asArray()->all();
        $formattedDates = [];

        foreach ($dates as $date) {
            $formattedDates[] = Yii::$app->formatter->asDate($date['date'], 'yyyy-MM-dd');
        }

        return $formattedDates;
    }

    public function actionGetData($date, $startDate = null): array
    {
        $formatDate = date("Y-m-d", strtotime($date));

        if ($startDate == null) {
            $response = ResponseService::successResponse(
                'One data',
                Map::find()
                    ->orderBy('date DESC')
                    ->filterWhere(['=', 'date', $formatDate])
                    ->orFilterWhere(['<=', 'date', $formatDate])
                    ->limit(1)
                    ->one()
            );
        } else {
            $formatStartDate = date("Y-m-d", strtotime($startDate));

            $response = ResponseService::successResponse(
                'Data for the period.',
                Map::find()
                    ->orderBy('date DESC')
                    ->where(['<=', 'date', $formatDate])
                    ->andWhere(['>=', 'date', $formatStartDate])
                    ->all()
            );
        }

        if (empty($response['data'])) {
            $response = ResponseService::errorResponse(
                'The data not exist!'
            );
        }
        return $response;
    }

    public function actionSetData(): array
    {
        $json = Yii::$app->request->post('json_data');
        $circleData = Yii::$app->request->post('circle_data');
        $date = date('Y-m-d', strtotime(Yii::$app->request->post('date')));

        if (Map::find()->where(['date' => $date])->exists()) {
            $mapModel = Map::find()->where(['date' => $date])->one();
        } else {
            $mapModel = new Map();
            $mapModel->date = $date;
        }

        if (!empty($circleData)) {
            $mapModel->circle_data = $circleData;
        }

        $mapModel->json_data = $json;
        if ($mapModel->save()) {
            $response = ResponseService::successResponse(
                'Data is saved!',
                Map::find()->where(['id' => $mapModel->id])->all()
            );
        } else {
            Yii::$app->response->statusCode = 400;
            $response = ResponseService::errorResponse(
                $mapModel->getErrors()
            );
        }
        return $response;
    }
}
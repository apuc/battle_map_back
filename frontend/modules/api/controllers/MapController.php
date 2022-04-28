<?php


namespace frontend\modules\api\controllers;


use common\behaviors\GsCors;
use common\services\ResponseService;
use frontend\modules\api\models\Map;
use Yii;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;


class MapController extends Controller
{
    public $modelClass = 'frontend\modules\api\models\News';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'news',

    ];

    public function behaviors(): array
    {
        return [
            'corsFilter' => [
                'class' => GsCors::class,
                'cors' => [
                    'Origin' => ['*'],
                    //'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Allow-Headers' => [
                        'Content-Type',
                        'Access-Control-Allow-Headers',
                        'Authorization',
                        'X-Requested-With'
                    ],
                ]
            ],
            [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

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
                    ->filterWhere(['like', 'date', $formatDate])
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
        $date = Yii::$app->request->post('date');

        if (Map::find()->where(['date' => $date])->exists()) {
            $mapModel = Map::find()->where(['date' => $date])->one();
        } else {
            $mapModel = new Map();
        }

        $mapModel->json_data = $json;
        $mapModel->date = $date;

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
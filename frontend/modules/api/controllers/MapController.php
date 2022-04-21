<?php


namespace frontend\modules\api\controllers;


use common\behaviors\GsCors;
use common\services\ResponseService;
use DateTime;
use frontend\modules\api\models\Map;
use Yii;
use yii\data\ActiveDataProvider;
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
            'map-list' => ['GET'],
            'set-map' => ['POST'],
        ];
    }

    public function actionMap($date): array
    {
        $formatDate = date("Y-m-d", strtotime($date));

        $response = ResponseService::successResponse(
            'One map.',
            Map::find()
                ->orderBy('created_at DESC')
                ->filterWhere(['like', 'created_at', $formatDate])
                ->orFilterWhere(['<=', 'created_at', $formatDate])
                ->limit(1)
                ->one()
        );

        if (empty($response['data'])) {
            $response = ResponseService::errorResponse(
                'The map not exist!'
            );
        }
        return $response;
    }

    public function actionMapList(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Map::find()->orderBy('created_at'),
        ]);
    }

    public function actionSetMap(): array
    {
        $mapModel = new Map();
        $mapModel->json_data = Yii::$app->request->post('json_data');

        if ($mapModel->save()) {
            $response = ResponseService::successResponse(
                'Map is created!',
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
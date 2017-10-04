<?php
namespace app\models;
use Yii;
use yii\base\Model;
class Games extends Model
{
	$arr = array(
            array(
                'firstname' => 'admin',
                'email' => 'test@gmail.com1',
                'created_at' => '1438444515',
                'subscriptions' => '',
                'status' => 0,
                'status_word' => 'Отключен',
            ),
            array(
                'firstname' => 'doghamst',
                'email' => 'teste@gmail.com1',
                'created_at' => '1438444515',
                'subscriptions' => '',
                'status' => 0,
                'status_word' => 'Подключен',
            ),
            array(
                'firstname' => 'kusman',
                'email' => 'teste@gmail.com1',
                'created_at' => '1438444515',
                'subscriptions' => '',
                'status' => 0,
                'status_word' => 'Подключен',
            ),
        );
 
$dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $arr,
            'sort' => [
                'attributes' => ['firstname', 'email', 'created_at', 'subscriptions', 'status_word'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
}
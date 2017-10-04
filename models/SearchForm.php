<?php

namespace app\models;
use yii\base\Model;
use Yii;

class SearchForm extends Model
{
    public $text;
    

    public function rules()
    {
        return [
            // тут определяются правила валидации
        ];
    }
}

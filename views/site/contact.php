<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Обратная связь';
$this->registerMetaTag(['name' => 'description','content' => 'Отправить нам сообщение, получить обратную связь']);
$this->registerMetaTag(['name' => 'keywords','content' => 'Написать нам, обратная связь,заказ игры, задать вопрос']);
$this->params['breadcrumbs'][] = $this->title;

$text = "";
if(isset($_GET["subject"]) && !empty($_GET["subject"])){
    if(!empty($_GET["subject"])){
        $text =$_GET["subject"];}}

$model -> subject = $text;

?>




<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо за Ваше обращение!
        </div>
      

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Ваше имя')?>
			
                    <?= $form->field($model, 'email')->label('Ваш email')?>

                    <?= $form->field($model, 'subject')->label('Тема')?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Сообщение')?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

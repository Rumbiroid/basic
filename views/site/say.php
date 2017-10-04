<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
$games = ' ';
?>
<h1>Countries</h1>
<ul>
//<?php foreach ($game as $games): ?>
    <li>
        <?= Html::encode("{$game->name} ({$game->id})") ?>:
        <?= $games->id ?>
    </li>
//<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
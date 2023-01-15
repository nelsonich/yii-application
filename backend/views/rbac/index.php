<?php

/** @var yii\web\View $this */

use yii\grid\GridView;

$this->title = 'User list';

echo GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'email',
        [
            'label' => 'Status',
            'value' => function ($model) {
                return $model->getStatusName();
            }
        ],
        'created_at:datetime',
        [
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'update' => Yii::$app->user->can('updateUser'),
                'delete' => Yii::$app->user->can('deleteUser'),
                'view' => FALSE,
            ]
        ],
    ],
]);

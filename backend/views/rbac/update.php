<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var ActiveForm $form */
?>
<div class="rbac-update">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'status')->dropDownList(User::STATUSES); ?>

    <?= $form->field($user, 'email')->textInput(); ?>

    <?= $form->field($user, 'username')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<!-- rbac-update -->
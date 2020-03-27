<?php

/* @var $this \yii\web\View */
/* @var $content string */



//AppAsset::register($this);
//echo $this->params['title'];

use kartik\date\DatePicker;
?>
<?php if (!$this->params['isEmbed']): ?>
<div class="well well-sm form-date-picker-extended xs-align-mid">
    <?= DatePicker::widget([
        'name' => 'date',
        'type' => DatePicker::TYPE_INLINE,
        'value' => $this->params['calculationDate'],
        'pluginOptions' => [
            'format' => 'dd-m-yyyy',
            'multidate' => false
        ],
        'options' => [
            'format' => 'dd-m-yyyy',
        ]
    ]);?>
</div>
<?php else: ?>
    <div class="well well-sm form-date-picker-extended xs-align-mid">
        <?= DatePicker::widget([
            'name' => 'date',
            'type' => DatePicker::TYPE_INPUT,
            'value' => $this->params['calculationDate'],
            'pluginOptions' => [
                'format' => 'dd-m-yyyy',
                'multidate' => false,
                'autoclose' => true,
            ],
            'options' => [
                'format' => 'dd-m-yyyy',
            ]
        ]);?>
    </div>
<?php endif; ?>
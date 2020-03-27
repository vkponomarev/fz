<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.08.19
 * Time: 16:24
 */
/** @var TYPE_NAME $pregnancyCalculationResult */
/** @var TYPE_NAME $currentLanguages */
/** @var TYPE_NAME $pregnancyCalculationDate */

/** @var TYPE_NAME $pregnancyCalculationMethod */


/*

Калькулятор беременности по дате первого шевелния плода

*/


use kartik\date\DatePicker;
?>




    <div class="form-left">

        <?=$this->render('/partials/embed/_embed-label-link.php');?>

        <form action="./<?php if (!$this->params['isEmbed']):?>#result<?php endif;?>">

            <?=$this->render('/partials/embed/_embed-hidden-input.php');?>

            <div class="col-xs-12 col-sm-6 align-mid">

                <div class="form-left-title"><?=Yii::t('app','Is this your first pregnancy or not:')?></div>

                <div>
                    <label class="form-left-label" id="form-label-id-one">
                            <span class="form-radio">
                                <?php
                                if ($pregnancyCalculationByFetalMovement['pregnancyCalculationMethod'] == 3):?>
                                    <input type="radio" name="method" value="3" checked="checked" class="">
                                <?php elseif (!$pregnancyCalculationByFetalMovement['pregnancyCalculationMethod']): ?>
                                    <input type="radio" name="method" value="3" checked="checked" class="">
                                <?php else: ?>
                                    <input type="radio" name="method" value="3" class="">
                                <?php endif;
                                ?>

                            </span>
                        <span class="form-radio"><?=Yii::t('app','First pregnancy')?></span>
                    </label>

                    <br>

                    <label class="form-left-label" id="form-label-id-two">
                            <span class="form-radio">

                                <?php if ($pregnancyCalculationByFetalMovement['pregnancyCalculationMethod'] == 4): ?>
                                    <input type="radio" name="method" checked="checked" value="4">
                                <?php else: ?>
                                    <input type="radio" name="method" value="4">
                                <?php endif ?>

                            </span>

                        <span class="form-radio"><?=Yii::t('app','Second and more pregnancy')?></span>
                    </label>

                </div>

            </div>


            <div class="col-xs-12 col-sm-6 align-mid">
                <hr class="form-hr-xs-block">

                <div class="form-choose-date-text-1"
                     id="form-radio-choose-text-one">
                    <?=Yii::t('app','Select the date of the first fetal movement:')?>
                </div>

                <?= $this->render('/partials/date-picker/_standard-date-picker.php')?>

            </div>

            <div class="clearfix"></div>
            <div class="form-ad col-12">
                <a name="result"></a>

                <?= $this->render('/partials/ads/_ads_5', [
                    'allAdvertising' => $allAdvertising])
                ?>

            </div>
            <br>

            <div class="form-button-div">

                <input class="btn btn-success form-button" type="submit" value="<?=Yii::t('app','Calculate pregnancy')?>"
                       id="button_calc">

            </div>
            <br>

        </form>

    </div>


    <div class="<?php if (($pregnancyCalculationByFetalMovement['pregnancyCalculationDivShow']) or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

            <span class="form-result">

                <?=Yii::t('app','Result')?>

            </span>

        <br><br>

        <div class="result-div-text">
                <span class="result-pre-text">
                    <?=Yii::t('app','Your gestational age:')?>
                    <br>
                </span>
            <span class="result-main-text">


                    <?php if ($pregnancyCalculationByFetalMovement['pregnancyCalculationException'] == 'echoPlanning'): ?>

                        <?=Yii::t('app','You are planning a pregnancy')?>

                    <?php endif ?>

                <?php if ($pregnancyCalculationByFetalMovement['pregnancyCalculationException'] == 'echoHaveBaby'): ?>

                        <?=Yii::t('app','You have already given birth to a baby')?>

                <?php endif ?>

                <?php if ($pregnancyCalculationByFetalMovement['pregnancyCalculationException'] == 'echoWeeks'): ?>

                    <?= Yii::t('app', '{n,plural, one{# week} few{# weeks} other{# weeks}}', ['n' => $pregnancyCalculationByFetalMovement['pregnancyWeeks']]) ?>

                <?php endif ?>

                </span>
        </div>


        <div class="result-div-text">

                <span class="result-pre-text">
                    <?=Yii::t('app','Estimated due date:')?><br>
                </span>


            <span class="result-main-text">
                    <?= $pregnancyCalculationByFetalMovement['dueDate']; ?>
                </span>

        </div>

    </div>

    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>






<?php

?>





<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.08.19
 * Time: 16:24
 */


/*

Каледнарь беременности

*/
use kartik\date\DatePicker;

?>



    <div class="form-left">

        <?=$this->render('/partials/embed/_embed-label-link.php');?>

        <form action="./<?php if (!$this->params['isEmbed']):?>#result<?php endif;?>">

            <?=$this->render('/partials/embed/_embed-hidden-input.php');?>

            <div class="col-xs-12 col-sm-6 align-mid">

                <div class="form-left-title"><?=Yii::t('app','Pregnancy calculation method:')?></div>

                <div>
                    <label class="form-left-label" id="form-label-id-one">
                            <span class="form-radio">
                                <?php if ($pregnancyCalculation['pregnancyCalculationMethod'] == 1):?>
                                    <input type="radio" name="method" value="1" checked="checked" class="">
                                <?php elseif (!$pregnancyCalculation['pregnancyCalculationMethod']): ?>
                                    <input type="radio" name="method" value="1" checked="checked" class="">
                                <?php else: ?>
                                    <input type="radio" name="method" value="1" class="">
                                <?php endif; ?>

                            </span>
                        <span class="form-radio"><?=Yii::t('app','By date of last period')?></span>
                    </label>

                    <br>

                    <label class="form-left-label" id="form-label-id-two">
                            <span class="form-radio">

                                <?php if ($pregnancyCalculation['pregnancyCalculationMethod'] == 2): ?>
                                    <input type="radio" name="method" checked="checked" value="2">
                                <?php else: ?>
                                    <input type="radio" name="method" value="2">
                                <?php endif ?>

                            </span>

                        <span class="form-radio"><?=Yii::t('app','By date of conception')?></span>
                    </label>

                </div>

            </div>


            <div class="col-xs-12 col-sm-6 align-mid">
                <hr class="form-hr-xs-block">

                <div class="form-choose-date-text-1"
                     id="form-radio-choose-text-one">
                    <?=Yii::t('app','Select the first day of your last period:')?>
                </div>
                <div class="form-choose-date-text-2"
                     id="form-radio-choose-text-two">
                    <?=Yii::t('app','Select the date of conception:')?>
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

            <div class="form-button-div" >

                <input class="btn btn-success form-button" type="submit" value="<?=Yii::t('app','Calculate pregnancy')?>"
                       id="button_calc">

            </div>
            <br>

        </form>

    </div>


    <div class="<?php if (($pregnancyCalculation['pregnancyCalculationDivShow']) or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

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


                    <?php if ($pregnancyCalculation['pregnancyCalculationException'] == 'echoPlanning'): ?>

                        <?=Yii::t('app','You are planning a pregnancy')?>

                    <?php endif ?>

                <?php if ($pregnancyCalculation['pregnancyCalculationException'] == 'echoHaveBaby'): ?>

                        <?=Yii::t('app','You have already given birth to a baby')?>

                <?php endif ?>

                <?php if ($pregnancyCalculation['pregnancyCalculationException'] == 'echoWeeks'): ?>

                    <?= Yii::t('app', '{n,plural, one{# week} few{# weeks} other{# weeks}}', ['n' => $pregnancyCalculation['pregnancyWeeks']]) ?>

                <?php endif ?>

                </span>
        </div>


        <div class="result-div-text">

                <span class="result-pre-text">
                    <?=Yii::t('app','Estimated due date:')?><br>
                </span>


            <span class="result-main-text">
                    <?= $pregnancyCalculation['dueDate']; ?>
                </span>

        </div>

    </div>

    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>

    <div class="calendar-center">
        <?php

        $countMonthsForName = 0;
        //echo $countMonths . '<br>';
        $countMonths = $pregnancyCalendar['startMonth'];
        //echo $pregnancyCalendar['startMonth'];
        foreach ($pregnancyCalendar['calendar'] as $months) :?>
            <?php $countMonthsForName ++;?>

            <?php if ($countMonths==13){
                $countMonths=1;
            }
            ?>

            <div class="calendar-one-month">
                <div class="col-xs-12 calendar-month-name">
                    <span class="fa fa-calendar calendar-month-icon">
                    </span>
                    <span>

                    <?=$allCalendarsData['nameOfMonthsInYear'][$countMonthsForName];?>



                    </span>
                </div>

                <div>


                    <div class="calendar-days-name">
                        <?php for($i=1;$i<=7;$i++): ?>
                            <div class="col-xs-12 calendar-one-day-name">
                                <span>

                                    <?=$allCalendarsData['nameOfDaysInWeek'][$i]?>

                                </span>
                            </div>
                        <?php endfor;?>
                    </div>
                    <?php $countWeeks = 0;?>
                    <?php foreach ($months as $week):?>
                        <?php $countWeeks ++;?>
                        <?php $countWeekDay = 0;?>

                        <?php $findFirstWeekDay = 0;?>
                        <div class="calendar-one-week">

                            <?php for ($i = 1; $i <= 7; $i++):?>

                                <?php if (isset($week[$i])):?>

                                    <?php $countWeekDay ++;?>
                                    <?php if (($week[$i]['pregnancyWeek'] & 1)
                                        &&($week[$i]['pregnancyWeek']<>0)
                                        &&($week[$i]['todayDate']<>1)
                                        &&($week[$i]['trimesterTwo']<>1)
                                        &&($week[$i]['trimesterThree']<>1)
                                        &&($week[$i]['dueDate']<>1)

                                    ):?>
                                        <div class="col-xs-12 calendar-one-day pregnancy-day-odd" data-title="<?=$week[$i]['pregnancyWeek']?> <?=Yii::t('app','week of pregnancy')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>

                                </span>
                                        </div>
                                    <?php elseif (!($week[$i]['pregnancyWeek'] % 2)
                                        &&($week[$i]['pregnancyWeek']<>0)
                                        &&($week[$i]['todayDate']<>1)
                                        &&($week[$i]['trimesterTwo']<>1)
                                        &&($week[$i]['trimesterThree']<>1)
                                        &&($week[$i]['dueDate']<>1)
                                    ): ?>
                                        <div class="col-xs-12 calendar-one-day pregnancy-day-even" data-title="<?=$week[$i]['pregnancyWeek']?> <?=Yii::t('app','week of pregnancy')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php elseif (($week[$i]['todayDate']==1)
                                        &&($week[$i]['trimesterTwo']<>1)
                                        &&($week[$i]['trimesterThree']<>1)
                                        &&($week[$i]['dueDate']<>1)
                                    ): ?>
                                        <div class="col-xs-12 calendar-one-day pregnancy-today-day" data-title="<?=Yii::t('app','Present day')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php elseif ($week[$i]['trimesterTwo']==1): ?>
                                        <div class="col-xs-12 calendar-one-day pregnancy-trimester-two-day" data-title="<?=Yii::t('app','Start of the second trimester')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php elseif ($week[$i]['trimesterThree']==1): ?>
                                        <div class="col-xs-12 calendar-one-day pregnancy-trimester-three-day" data-title="<?=Yii::t('app','Start of the third trimester')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>


                                    <?php elseif ($week[$i]['dueDate']==1): ?>
                                        <div class="col-xs-12 calendar-one-day pregnancy-due-date" data-title="<?=Yii::t('app','Estimated due date')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php else: ?>

                                        <div class="col-xs-12 calendar-one-day ">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif ?>

                                <?php else: ?>

                                    <div class="col-xs-12 calendar-one-day  not-this-month-day">
                            <span>

                            </span>
                                    </div>
                                <?php endif;?>



                            <?php endfor;?>

                        </div>




                    <?php endforeach; ?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <div class="row row-padding">


        <div class="legend-center">

            <div class="calendar-legend">
                <div class="calendar-legend-image today-day-legend">

                </div>
                <div class="calendar-legend-text">
                    <?=Yii::t('app','Present day')?>
                </div>

            </div>
            <div class="calendar-legend">
                <div class="calendar-legend-image second-trimester-day-legend">

                </div>

                <div class="calendar-legend-text">
                    <?=Yii::t('app','Start of the second trimester')?>
                </div>
            </div>
            <div class="calendar-legend">
                <div class="calendar-legend-image third-trimester-day-legend">

                </div>
                <div class="calendar-legend-text">
                    <?=Yii::t('app','Start of the third trimester')?>
                </div>
            </div>

            <div class="calendar-legend">
                <div class="calendar-legend-image due-date-day-legend">

                </div>
                <div class="calendar-legend-text">
                    <?=Yii::t('app','Estimated due date')?>
                </div>
            </div>

        </div>
    </div>


<script>
    document.getElementById('form-label-id-one').onclick = function () {

        document.getElementById('form-radio-choose-text-one').style.display = 'block';
        document.getElementById('form-radio-choose-text-two').style.display = 'none';
    };
    document.getElementById('form-label-id-two').onclick = function () {

        document.getElementById('form-radio-choose-text-one').style.display = 'none';
        document.getElementById('form-radio-choose-text-two').style.display = 'block';
    };

</script>

<?php

?>












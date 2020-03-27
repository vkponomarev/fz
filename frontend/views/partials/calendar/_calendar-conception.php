

    <div class="calendar-center">
        <?php
        $countMonths = 0;
        $countWeeks = 0;
        foreach ($conceptionCalendar as $months) :?>
            <?php $countMonths ++;?>
            <div class="calendar-one-month">
                <div class="col-xs-12 calendar-month-name">
                <span>

                    <?=$allCalendarsData['nameOfMonthsInYear'][$countMonths];?>

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

                    <?php foreach ($months as $week):?>
                        <div class="calendar-one-week">

                            <?php for ($i = 1; $i <= 7; $i++):?>

                                <?php if (isset($week[$i])):?>

                                    <?php if ($week[$i]['menstruationDay'] == 1):?>
                                        <div class="col-xs-12 calendar-one-day menstruation-day" data-title="<?=Yii::t('app','Menstruation')?>">
                                <span>
                                     <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>
                                    <?php if (($week[$i]['ovulationDay'] == 1)&&($week[$i]['menstruationDay']==0)):?>
                                        <div class="col-xs-12 calendar-one-day ovulation-day" data-title="<?=Yii::t('app','Favorable days for conception')?>">
                                <span>
                                    <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>
                                    <?php if (($week[$i]['ovulationDay'] == 2)&&($week[$i]['menstruationDay']==0)):?>
                                        <div class="col-xs-12 calendar-one-day ovulation-middle-day" data-title="<?=Yii::t('app','Ovulation')?>">
                                <span>
                                    <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>
                                    <?php if (($week[$i]['ovulationDay'] == 3)&&($week[$i]['menstruationDay']==0)):?>
                                        <div class="col-xs-12 calendar-one-day ovulation-day" data-title="<?=Yii::t('app','Favorable days for conception')?>">
                                <span>
                                    <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>
                                    <?php if (($week[$i]['ovulationDay'] == 0)&&($week[$i]['menstruationDay']==0)&&($week[$i]['conceptionNegativeDay']==1)):?>
                                        <div class="col-xs-12 calendar-one-day conception-negative-day" data-title="<?=Yii::t('app','Unfavorable days for conception')?>">
                                <span>
                                    <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>
                                    <?php if (($week[$i]['ovulationDay'] == 0)&&($week[$i]['menstruationDay']==0)&&($week[$i]['conceptionNegativeDay']==2)):?>
                                        <div class="col-xs-12 calendar-one-day conception-negative-day" data-title="<?=Yii::t('app','Unfavorable days for conception')?>">
                                <span>
                                    <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>
                                    <?php if (($week[$i]['ovulationDay'] == 0)&&($week[$i]['menstruationDay']==0)&&($week[$i]['conceptionNegativeDay']==0)):?>
                                        <div class="col-xs-12 calendar-one-day">
                                <span>
                                    <?=$week[$i]['dayInMonth'];?>
                                </span>
                                        </div>
                                    <?php endif;?>

                                <?php else: ?>
                                    <div class="col-xs-12 calendar-one-day">
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

    <div class="legend-center">

        <div class="calendar-legend">
            <div class="calendar-legend-image menstruation-day-legend">

            </div>
            <div class="calendar-legend-text">
                <?=Yii::t('app','Menstruation')?>
            </div>

        </div>
        <div class="calendar-legend">
            <div class="calendar-legend-image ovulation-day-legend">

            </div>

            <div class="calendar-legend-text">
                <?=Yii::t('app','Favorable days for conception')?>
            </div>
        </div>
        <div class="calendar-legend">
            <div class="calendar-legend-image ovulation-middle-day-legend">

            </div>
            <div class="calendar-legend-text">
                <?=Yii::t('app','Ovulation')?>
            </div>
        </div>
        <div class="calendar-legend">
            <div class="calendar-legend-image conception-negative-day-legend">

            </div>
            <div class="calendar-legend-text">
                <?=Yii::t('app','Unfavorable days for conception')?>
            </div>
        </div>

    </div>


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

Калькулятор беременности по дате последних месячных

*/


use kartik\date\DatePicker;

?>




    <div class="form-left">

        <?=$this->render('/partials/embed/_embed-label-link.php');?>

        <form action="./<?php if (!$this->params['isEmbed']):?>#result<?php endif;?>">

            <?=$this->render('/partials/embed/_embed-hidden-input.php');?>

            <div class="form-content">
                <div class="col-xs-12 col-sm-6 align-mid">

                    <div class="form-choose-date-text-1"
                         id="form-radio-choose-text-one">
                        <?=Yii::t('app','Choose a week of pregnancy:')?>
                    </div>

                    <select name="pregnancy-week" class="form-control select-extended">

                        <?php for ($i=1;$i<=40;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($dueDateByPregnancyWeekData['dueDatePregnancyWeek']){
                                    if ($i==$dueDateByPregnancyWeekData['dueDatePregnancyWeek'])
                                        echo 'selected="selected"';
                                } elseif ($i==1){
                                    echo 'selected="selected"';
                                }
                                ?>
                            ><?=$i?>
                            </option>
                        <?php endfor;?>

                    </select>

                </div>

                <div class="col-xs-12 col-sm-6 align-mid">

                    <div class="clearfix"></div>
                    <div class="form-ad col-12">
                        <a name="result"></a>

                        <?= $this->render('/partials/ads/_ads_5', [
                            'allAdvertising' => $allAdvertising])
                        ?>


                    </div>
                </div>
                <br>
            </div>
            <div>
                <div class="form-button-div">
                    <br>
                    <br>
                    <input class="btn btn-success form-button" type="submit" value="<?=Yii::t('app','Calculate pregnancy')?>"
                           id="button_calc">

                </div>
                <br>

            </div>
        </form>

    </div>



    <div class="<?php if (($dueDateByPregnancyWeekCalculation['viewResult']) or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

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

                <?= Yii::t('app', '{n,plural, one{# week} few{# weeks} other{# weeks}}', ['n' => $dueDateByPregnancyWeekData['dueDatePregnancyWeek']]) ?>

           </span>
        </div>


        <div class="result-div-text">

            <span class="result-pre-text">
                <?=Yii::t('app','Estimated due date:');?><br>
            </span>


            <span class="result-main-text">

                    <?=$dueDateByPregnancyWeekCalculation['dueDate']; ?>
            </span>

        </div>

    </div>


    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>





<?php
 
?>





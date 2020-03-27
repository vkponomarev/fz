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

                    <input type="hidden" name="method" value="1">

                    <div class="form-choose-date-text-1"
                         id="form-radio-choose-text-one">
                        <?=Yii::t('app','Choose your due date:')?>
                    </div>

                    <?= $this->render('/partials/date-picker/_standard-date-picker.php')?>

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
                    <input class="btn btn-success form-button" type="submit" value="<?=Yii::t('app','Calculate conception')?>"
                       id="button_calc">

                </div>
                <br>

             </div>
        </form>

    </div>



    <div class="<?php if (($conceptionDateByDueDateCalculation['viewResult']) or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

            <span class="form-result">

                <?=Yii::t('app','Result')?>

            </span>


        <br><br>



        <div class="result-div-text">

                <span class="result-pre-text">
                    <?=Yii::t('app','Estimated date of conception:')?><br>
                </span>


            <span class="result-main-text">
                    <?= $conceptionDateByDueDateCalculation['conceptionDate']; ?>
                </span>

        </div>

    </div>

    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>





<?php
 
?>





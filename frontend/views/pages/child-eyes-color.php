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

Калькулятор беременности

*/
use dosamigos\datepicker\DatePicker;


?>



    <div class="form-left">

        <?=$this->render('/partials/embed/_embed-label-link.php');?>

        <form action="./<?php if (!$this->params['isEmbed']):?>#result<?php endif;?>">

            <?=$this->render('/partials/embed/_embed-hidden-input.php');?>

            <div class="form-content">

                <div class="col-xs-12 col-sm-6 align-mid">

                    <div class="form-left-title"><?=Yii::t('app','Mom\'s eye color:')?></div>

                    <select id="cycle-length-from" name="mother-eyes-color" class="form-control select-extended">

                        <?php for ($i=1;$i<=3;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($childEyesColorCalculationData['motherEyesColor']){
                                    if ($i==$childEyesColorCalculationData['motherEyesColor'])
                                        echo 'selected="selected"';
                                } elseif ($i==1){
                                    echo 'selected="selected"';
                                }
                                ?>
                            >
                                <?php if ($i==1):?>
                                    <?=Yii::t('app','Brown')?>
                                <?php elseif($i==2):?>
                                    <?=Yii::t('app','Green')?>
                                <?php else:?>
                                    <?=Yii::t('app','Blue')?>
                                <?php endif?>
                            </option>
                        <?php endfor;?>

                    </select>

                    <div class="form-left-title"><?=Yii::t('app','Dad\'s eye color:')?></div>

                    <select id="cycle-length-from" name="father-eyes-color" class="form-control select-extended">

                        <?php for ($i=1;$i<=3;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($childEyesColorCalculationData['fatherEyesColor']){
                                    if ($i==$childEyesColorCalculationData['fatherEyesColor'])
                                        echo 'selected="selected"';
                                } elseif ($i==1){
                                    echo 'selected="selected"';
                                }
                                ?>
                            >
                                <?php if ($i==1):?>
                                    <?=Yii::t('app','Brown')?>
                                <?php elseif($i==2):?>
                                    <?=Yii::t('app','Green')?>
                                <?php else:?>
                                    <?=Yii::t('app','Blue')?>
                                <?php endif?>
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

            </div>

            <div>
                <div class="form-button-div">
                    <br>
                    <br>
                    <input class="btn btn-success form-button" type="submit" value="<?=Yii::t('app','Calculate')?>"
                           id="button_calc">

                </div>
                <br>

            </div>

        </form>

    </div>



    <div class="<?php if (($childEyesColorCalculation['viewResult']<>0) or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

        <span class="form-result">
            <?=Yii::t('app','Result')?>
        </span>

        <br><br>
        <div class="result-div-text">
            <span class="result-pre-text">
                <?php if ($childEyesColorCalculation['childEyesColorBrown']<>0):?>
                    <?=Yii::t('app','Brown eyes')?>
                    <?=$childEyesColorCalculation['childEyesColorBrown']?> %<br>
                <?php endif;?>
                <?php if ($childEyesColorCalculation['childEyesColorGreen']<>0):?>
                    <?=Yii::t('app','Green eyes')?>
                    <?=$childEyesColorCalculation['childEyesColorGreen']?> %<br>
                <?php endif;?>
                <?php if ($childEyesColorCalculation['childEyesColorBlue']<>0):?>
                    <?=Yii::t('app','Blue eyes')?>
                    <?=$childEyesColorCalculation['childEyesColorBlue']?> %<br>
                <?php endif;?>

            </span>


        </div>
    </div>

    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>










<?php

?>





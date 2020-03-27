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



?>


    <div class="form-left">

        <?=$this->render('/partials/embed/_embed-label-link.php');?>

        <form action="./<?php if (!$this->params['isEmbed']):?>#result<?php endif;?>">

            <?=$this->render('/partials/embed/_embed-hidden-input.php');?>

            <div class="form-content">

                <div class="col-xs-12 col-sm-6 align-mid">

                    <div class="form-left-title"><?=Yii::t('app','Choose the gender of the child:')?></div>

                    <div>
                        <label class="form-left-label" id="form-label-id-one">
                            <span class="form-radio">
                                <?php
                                if ($childWeightHeightCalculationData['childGender'] == 1):?>
                                    <input type="radio" name="child-gender" value="1" checked="checked" class="">
                                <?php elseif (!$childWeightHeightCalculationData['childGender']): ?>
                                    <input type="radio" name="child-gender" value="1" checked="checked" class="">
                                <?php else: ?>
                                    <input type="radio" name="child-gender" value="1" class="">
                                <?php endif; ?>

                            </span>
                            <span class="form-radio"><?=Yii::t('app','Boy')?></span>
                        </label>

                        <br>

                        <label class="form-left-label" id="form-label-id-two">
                            <span class="form-radio">

                                <?php if ($childWeightHeightCalculationData['childGender'] == 2): ?>
                                    <input type="radio" name="child-gender" checked="checked" value="2">
                                <?php else: ?>
                                    <input type="radio" name="child-gender" value="2">
                                <?php endif ?>

                            </span>

                            <span class="form-radio"><?=Yii::t('app','Girl')?></span>
                        </label>

                    </div>

                    <div class="form-left-title"><?=Yii::t('app','Age in years:')?></div>

                    <select id="cycle-length-from" name="child-age-years" class="form-control select-extended">

                        <?php for ($i=0;$i<=11;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($childWeightHeightCalculationData['childAgeYears']){
                                    if ($i==$childWeightHeightCalculationData['childAgeYears'])
                                        echo 'selected="selected"';
                                } elseif ($i==1){
                                    echo 'selected="selected"';
                                }
                                ?>
                            ><?=$i?>
                            </option>
                        <?php endfor;?>

                    </select>

                    <div class="form-left-title"><?=Yii::t('app','Age in months:')?></div>


                    <select id="cycle-length-from" name="child-age-months" class="form-control select-extended">

                        <?php for ($i=0;$i<=11;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($childWeightHeightCalculationData['childAgeMonths']){
                                    if ($i==$childWeightHeightCalculationData['childAgeMonths'])
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



    <div class="<?php if (($childWeightHeightCalculation['viewResult']<>0) or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

        <span class="form-result">
            <?=Yii::t('app','Result')?>
        </span>

        <br><br>
        <div class="result-div-text">
            <span class="result-pre-text">
                <?php if ($childWeightHeightCalculation['childMiddleHeight']<>0):?>
                    <?=Yii::t('app','Average height for this age:')?>
                    <?=$childWeightHeightCalculation['childMiddleHeight']?> <?=Yii::t('app','cm')?><br>
                <?php endif;?>
                <?php if ($childWeightHeightCalculation['childMiddleWeight']<>0):?>
                    <?=Yii::t('app','Average weight for this age:')?>
                    <?=$childWeightHeightCalculation['childMiddleWeight']?> <?=Yii::t('app','kg')?><br>
                <?php endif;?>
                <?php if ($childWeightHeightCalculation['childMiddleHead']<>0):?>
                    <?=Yii::t('app','Average head size for this age:')?>
                    <?=$childWeightHeightCalculation['childMiddleHead']?> <?=Yii::t('app','cm')?><br>
                <?php endif;?>
            </span>


        </div>
    </div>

    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>






<?php

?>





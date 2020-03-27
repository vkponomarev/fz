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

use dosamigos\datepicker\DatePicker;


?>



    <div class="form-left">

        <?=$this->render('/partials/embed/_embed-label-link.php');?>

        <form action="./<?php if (!$this->params['isEmbed']):?>#result<?php endif;?>">

            <?=$this->render('/partials/embed/_embed-hidden-input.php');?>

            <div class="form-content">

                <div class="col-xs-12 col-sm-6 align-mid">

                    <div class="form-left-title"><?=Yii::t('app','Choose Mom\'s RH factor:')?></div>

                    <select id="cycle-length-from" name="mother-rh-factor" class="form-control select-extended">

                        <?php for ($i=1;$i<=2;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($childGenderRhFactorData['childGenderMotherRhFactor']){
                                    if ($i==$childGenderRhFactorData['childGenderMotherRhFactor'])
                                        echo 'selected="selected"';
                                } elseif ($i==1){
                                    echo 'selected="selected"';
                                }
                                ?>
                            ><?php if ($i==1):?>
                                    <?=Yii::t('app','Negative')?>
                                <?php else:?>
                                    <?=Yii::t('app','Positive')?>
                                <?php endif?>
                            </option>
                        <?php endfor;?>

                    </select>

                    <div class="form-left-title"><?=Yii::t('app','Choose Dad\'s RH factor:')?></div>

                    <select id="cycle-length-from" name="father-rh-factor" class="form-control select-extended">

                        <?php for ($i=1;$i<=2;$i++):?>
                            <option value="<?=$i?>"
                                <?php if ($childGenderRhFactorData['childGenderFatherRhFactor']){
                                    if ($i==$childGenderRhFactorData['childGenderFatherRhFactor'])
                                        echo 'selected="selected"';
                                } elseif ($i==1){
                                    echo 'selected="selected"';
                                }
                                ?>
                            ><?php if ($i==1):?>
                                    <?=Yii::t('app','Negative')?>
                                <?php else:?>
                                    <?=Yii::t('app','Positive')?>
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



    <div class="<?php if (($childGenderRhFactor<>'n') or $this->params['isEmbed']):?>result-div-on<?php else: ?>result-div-off<?php endif ?>">

        <span class="form-result">
            <?=Yii::t('app','Result')?>
        </span>

        <br><br>
        <div class="result-div-text">
            <span class="result-main-text">
                <?php if ($childGenderRhFactor == 'g'): ?>
                    <?=Yii::t('app','You will have a girl')?>
                <?php else: ?>
                    <?=Yii::t('app','You will have a boy')?>
                <?php endif; ?>
                    <br>
            </span>


        </div>
    </div>

    <?=$this->render('/partials/embed/_embed-link-to-embed.php');?>

    <?=$this->render('/partials/share-social/_share-social.php',['currentLanguages' => $currentLanguages]);?>






<?php

?>





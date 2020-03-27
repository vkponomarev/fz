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



?>


<div class="form-embed">

    <form action="./">
        <select onchange="submit();" name="embed-url" class="form-control select-extended-embed">

            <option value="">

                <?=Yii::t('app','Choose calculator:')?>

            </option>

            <?php foreach ($embedPagesSelect as $item): ?>

                <option value="<?=$item['url']?>">

                <?=$item['plates_title']?>

                </option>


            <?php endforeach;?>
        </select>
    </form>
</div>
<br>
<div class="form-embed">
    <form action="./">

        <input type="hidden" name="embed-url" value="<?=$this->params['embedUrl']?>">

        <div class="form-embed">
            <input <?php if ($this->params['embedTitle']) {echo 'checked';} ?>
                    onchange="submit();"
                    class="form-check-input" type="checkbox"
                    value="<?php if ($this->params['embedTitle']) {echo '0';} else {echo '1';}?>"
                    name="title"
                    id="defaultCheck1">

            <label class="form-check-label form-embed-label" for="defaultCheck1">
                <?=Yii::t('app','Calculator title')?>
            </label>

        </div>
    </form>
</div>


<?php if($this->params['embedUrl']):?>

    <?php if ($this->params['embedTitle']):?>

        <?php $embedIframeSize['large'][1] += 50;?>
        <?php $embedIframeSize['middle'][1] += 50;?>
        <?php $embedIframeSize['small'][1] += 50;?>

    <?php endif;?>
    <div class="form-embed">
        <h2><?=$embedPageTranslations->plates_title;?></h2>
    </div>
    1.
    <br>

    <iframe
            src="<?=\yii\helpers\Url::home(true);?><?=$this->params['currentLanguages']->url?>/<?=$this->params['embedUrl'];?>/?embed=1<?php if ($this->params['embedTitle']) {echo '&title=1';}?>"
            width="<?=$embedIframeSize['large'][0]?>"
            height="<?=$embedIframeSize['large'][1]?>"
            frameborder="0"
            scrolling="no"
            allowfullscreen>
    </iframe>



    <br><br>

    <div class="embed-code">
    &lt;iframe
        src="<?=\yii\helpers\Url::home(true);?><?=$this->params['currentLanguages']->url?>/<?=$this->params['embedUrl'];?>/?embed=1<?php if ($this->params['embedTitle']) {echo '&title=1';}?>"
        width="<?=$embedIframeSize['large'][0]?>"
        height="<?=$embedIframeSize['large'][1]?>"
        frameborder="0"
        scrolling="no"
        allowfullscreen&gt;
    &lt;/iframe&gt;
    </div>
    <br>
    <br>
    2.
    <br>
    <br>
    <iframe
            src="<?=\yii\helpers\Url::home(true);?><?=$this->params['currentLanguages']->url?>/<?=$this->params['embedUrl'];?>/?embed=1<?php if ($this->params['embedTitle']) {echo '&title=1';}?>"
            width="<?=$embedIframeSize['middle'][0]?>"
            height="<?=$embedIframeSize['middle'][1]?>"
            frameborder="0"
            scrolling="no"
            allowfullscreen>
    </iframe>



    <br><br>

    <div class="embed-code">
        &lt;iframe
        src="<?=\yii\helpers\Url::home(true);?><?=$this->params['currentLanguages']->url?>/<?=$this->params['embedUrl'];?>/?embed=1<?php if ($this->params['embedTitle']) {echo '&title=1';}?>"
        width="<?=$embedIframeSize['middle'][0]?>"
        height="<?=$embedIframeSize['middle'][1]?>"
        frameborder="0"
        scrolling="no"
        allowfullscreen&gt;
        &lt;/iframe&gt;
    </div>
    <br>
    <br>
    3.
    <br>
    <br>
    <iframe
            src="<?=\yii\helpers\Url::home(true);?><?=$this->params['currentLanguages']->url?>/<?=$this->params['embedUrl'];?>/?embed=1<?php if ($this->params['embedTitle']) {echo '&title=1';}?>"
            width="<?=$embedIframeSize['small'][0]?>"
            height="<?=$embedIframeSize['small'][1]?>"
            frameborder="0"
            scrolling="no"
            allowfullscreen>
    </iframe>




    <br><br>

    <div class="embed-code">
        &lt;iframe
        src="<?=\yii\helpers\Url::home(true);?><?=$this->params['currentLanguages']->url?>/<?=$this->params['embedUrl'];?>/?embed=1<?php if ($this->params['embedTitle']) {echo '&title=1';}?>"
        width="<?=$embedIframeSize['small'][0]?>"
        height="<?=$embedIframeSize['small'][1]?>"
        frameborder="0"
        scrolling="no"
        allowfullscreen&gt;
        &lt;/iframe&gt;
    </div>
<?php else:?>





<?php endif;?>

<?php









 
?>





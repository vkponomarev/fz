<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.08.19
 * Time: 18:06
 */

use common\models\Pages;

/* @var $this yii\web\View */
/* @var $pages Pages */
/** @var \common\models\Pages $currentLanguages
 */
/** @var TYPE_NAME $pagesTranslations */


/** @var TYPE_NAME $languagesSwitcher */
/** @var TYPE_NAME $pregnancyCalculationMethod */
/** @var TYPE_NAME $pregnancyCalculationResult */
/** @var TYPE_NAME $pregnancyCalculationDate */
/** @var TYPE_NAME $parentPageCategories */

//$this->params['pagesTranslations'] = $pagesTranslations;
//$this->params['languagesSwitcher'] = $languagesSwitcher;
//$this->params['menuItems'] = $menuItems;
//$this->params['parentPageCategories'] = $parentPageCategories;


$this->params['pagesTranslations'] = $allPagesData['pagesTranslations'];
$this->params['currentLanguages'] = $currentLanguages;
$this->params['languagesSwitcher'] = $allPagesData['languagesSwitcher'];
$this->params['menuItems'] = $allPagesData['menuItems'];
$this->params['parentPageCategories'] = $allPagesData['parentPageCategories'];
$this->params['pages'] = $allPagesData['pages'];
$this->params['calculationDate'] = $calculationDate;
$this->params['model'] = $model;
$this->params['alternate'] = $alternate;
$this->params['canonical'] = $canonical;
$this->params['isEmbed'] = $isEmbed;
$this->params['embedUrl'] = $embedUrl;
$this->params['embedTitle'] = $embedTitle;
?>

<div class="container container-no-top-padding-extended">

    <div class="h1-main">
        <img src="/files/category-icons/<?=$allPagesData['pages']->id?>.png"
             alt="<?= $this->params['pagesTranslations']->h1 ?>"
             width="70" height="70" class="h1-img">

        <div class="h1-and-breadcrumbs">
            <h1 class="h1-all"><?= $this->params['pagesTranslations']->h1 ?></h1>
            <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">

                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    <a href="/<?=$this->params['currentLanguages']->url?>/" itemprop="item">
                        <span itemprop="name">
                        <?=Yii::t('app','Home')?>
                        </span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>

                <?php for ($x=1;$x<=2;$x++):?>
                    <?php if ($breadcrumbs[$x][1]==1):?>
                    <?php if ($breadcrumbs[$x][0]==1):?>

                            <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
                                itemtype="http://schema.org/ListItem">
                                /  <a href="/<?=$this->params['currentLanguages']->url?>/<?=$breadcrumbs[$x][3]?>/" itemprop="item">
                                    <span itemprop="name">
                                        <?=$breadcrumbs[$x][2]?>
                                    </span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>



                         <?php elseif ($breadcrumbs[$x][0]==0):?>

                            <li class="breadcrumbs-item">
                                / <?=$breadcrumbs[$x][2]?>
                            </li>


                        <?php endif;?>
                    <?php endif;?>
                <?php endfor;?>


            </ol>


        </div>



    </div><br>
    <p><?= $this->params['pagesTranslations']->text1 ?></p>


    <?= $this->render('/partials/ads/_ads_1', [
        'allAdvertising' => $allAdvertising])
    ?>

    <div class="row row-padding margin-top">


        <div class="col-lg-9 col-xs-12 div-left">

            <?php

            echo  $this->render($currentPageName, [
                'isEmbed' => $isEmbed,
                'embedIframeSize' => $embedIframeSize,
                'embedPageTranslations' => $embedPageTranslations,
                'embedPagesSelect' => $embedPagesSelect,
                'embedTitle' => $embedTitle,
                'model' => $model,
                'allCalendarsData' => $allCalendarsData,
                'allAdvertising' => $allAdvertising,
                'pageUrl' => $allPagesData['pages']->url,
                'pregnancyCalculationData' => $pregnancyCalculationData,
                'pregnancyCalculation' => $pregnancyCalculation,
                'pregnancyCalculationByFetalMovementData' => $pregnancyCalculationByFetalMovementData,
                'pregnancyCalculationByFetalMovement' => $pregnancyCalculationByFetalMovement,
                'currentLanguages' => $currentLanguages,
                'calculationDate' => $calculationDate,
                'ovulationCalculationData' => $ovulationCalculationData,
                'ovulationCalendar' => $ovulationCalendar,
                'conceptionCalendar' => $conceptionCalendar,
                'pregnancyCalendar' => $pregnancyCalendar,
                'conceptionChineseCalendar' =>$conceptionChineseCalendar,
                'conceptionChineseCalendarData' => $conceptionChineseCalendarData,
                'conceptionJapanCalendarData' => $conceptionJapanCalendarData,
                'conceptionJapanCalendar' => $conceptionJapanCalendar,
                'childGenderBloodRenewalData' => $childGenderBloodRenewalData,
                'childGenderBloodRenewal' => $childGenderBloodRenewal,
                'childGenderBloodTypeData' => $childGenderBloodTypeData,
                'childGenderBloodType' => $childGenderBloodType,
                'childGenderRhFactorData' => $childGenderRhFactorData,
                'childGenderRhFactor' => $childGenderRhFactor,
                'pregnancyWeightCalculationData' => $pregnancyWeightCalculationData,
                'pregnancyWeightCalculation' => $pregnancyWeightCalculation,
                'pregnancyUziCalculationData' => $pregnancyUziCalculationData,
                'pregnancyUziCalculation' => $pregnancyUziCalculation,
                'childWeightHeightCalculationData' => $childWeightHeightCalculationData,
                'childWeightHeightCalculation' => $childWeightHeightCalculation,
                'childHeightFutureCalculationData' => $childHeightFutureCalculationData,
                'childHeightFutureCalculation' => $childHeightFutureCalculation,
                'childEyesColorCalculationData' => $childEyesColorCalculationData,
                'childEyesColorCalculation' => $childEyesColorCalculation,
                'dueDateByPregnancyWeekData' => $dueDateByPregnancyWeekData,
                'dueDateByPregnancyWeekCalculation' => $dueDateByPregnancyWeekCalculation,
                'conceptionDateByDueDateData' => $conceptionDateByDueDateData,
                'conceptionDateByDueDateCalculation' => $conceptionDateByDueDateCalculation,

                 ])  ?>

            <?php if (($allPagesData['pages']->id<>41)
                and ($allPagesData['pages']->id<>42)
                and ($allPagesData['pages']->id<>43)
                and ($allPagesData['pages']->id<>44)
                and ($allPagesData['pages']->id<>45)
                and ($allPagesData['pages']->id<>47)
            ):?>
                <?php if ($this->params['currentLanguages']->url=='ru'):?>
                    <?= $this->render('/partials/comments/_vk-comments.php')?>
                <?php else:?>
                    <?= $this->render('/partials/comments/_fb-comments.php')?>
                <?php endif;?>
            <?php endif;?>
        </div>


        <div class="form-right col-sm-3">

            <?= $this->render('/partials/ads/_ads_2', [
                'allAdvertising' => $allAdvertising])
            ?>

        </div>


    </div>

<br><br>
    <?= $this->render('/partials/ads/_ads_3', [
        'allAdvertising' => $allAdvertising])
    ?>
    <p><?php  echo $this->params['pagesTranslations']->text2 ?></p>
    <?= $this->render('/partials/ads/_ads_4', [
        'allAdvertising' => $allAdvertising])
    ?>

</div>

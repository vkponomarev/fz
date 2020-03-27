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

<div class="container container-no-top-padding-extended-embed">


            <?php

            echo  $this->render($currentPageName, [
                'isEmbed' => $isEmbed,
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
</div>




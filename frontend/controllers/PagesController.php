<?php
namespace frontend\controllers;

use common\models\Blog;
use common\models\components\WomanCalendars;
use common\models\Mail;
use common\models\Pages;
use common\models\Advertising;
use common\models\components\WomanCalculators;
use common\models\PagesText;
use common\models\PagesTextSecond;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use mPDF;
use kartik\mpdf\Pdf;

/**
 * Site controller
 */
class PagesController extends Controller
{

   /*
  *  Здесь выводятся все элементы блога
  */
    public function actionIndex()
    {
        $currentLanguages = Pages::currentLanguages();
        $allPages = Pages::allPages();
        $allPagesTranslations = Pages::allPagesTranslations($currentLanguages->id);
        $languagesSwitcher = Pages::languagesSwitcher();
        $alternate = Pages::alternate(0,$languagesSwitcher,$currentLanguages);
        $canonical = Pages::canonical(0,$currentLanguages);

        return $this->render('index', [
            'pages' => 0,
            'pagesTranslations' => Pages::onePagesTranslations($currentLanguages->id,'index'),
            'currentLanguages' => $currentLanguages,
            'languagesSwitcher' => $languagesSwitcher,
            'menuItems' => Pages::menuItems($allPages, $allPagesTranslations),
            'mainPageCategories' => Pages::mainPageCategories($allPages, $allPagesTranslations),
            'currentPageId' =>  Pages::currentPageId('index'),
            'allAdvertising' => Advertising::allAdvertising(),
            'alternate' => $alternate,
            'canonical' => $canonical,

        ]);

    }



    public function actionOne($url)
    {


        if($pages = Pages::find()->andWhere(['url' => $url])->one()){

        } else {

            throw new NotFoundHttpException('404');

            }

        // Переменные и настройки для текстов всех страниц сайта

        if (!Yii::$app->request->get('date')){

            $calculationDate = WomanCalculators::todayDate('0');

        } else {

            $calculationDate = Yii::$app->request->get('date');

        }

        $isEmbed = Yii::$app->request->get('embed');




        $currentLanguages = Pages::currentLanguages();
        $allPages = Pages::allPages();
        $allPagesTranslations = Pages::allPagesTranslations($currentLanguages->id);
        $pregnancyCalculationMethod = Yii::$app->request->get('method');
        $languagesSwitcher = Pages::languagesSwitcher();
        $alternate = Pages::alternate($url,$languagesSwitcher,$currentLanguages);
        $canonical = Pages::canonical($url,$currentLanguages);

        //$embedUrl = Pages::embedUrl($url,$currentLanguages);

        // Если мы выводим встроенный калькулятор на стороннем сайте то используем соответсвующий шаблон
        $renderPage = 'page-one';

        if ($isEmbed){

            $this->layout = '/embed.php';
            $renderPage = 'page-one-embed';

        }

        $allPagesData = [
            'pages' => $pages,
            'pagesTranslations' => Pages::onePagesTranslations($currentLanguages->id,$url),
            'parentPageCategories' => Pages::parentPageCategories($allPages, $allPagesTranslations,$url),
            'languagesSwitcher' => $languagesSwitcher,
            'currentLanguages' => $currentLanguages,
            'menuItems' => Pages::menuItems($allPages, $allPagesTranslations),
        ];


        // Переменные и настройки для текстов всех страниц сайта

        $pregnancyUziCalculationData = [
            'pregnancyUziCalculationFetalLength' => Yii::$app->request->get('fetal-length'),
        ];

        $pregnancyWeightCalculationData = [
            'pregnancyWeightCalculationWeightBeforePregnancy' => Yii::$app->request->get('weight-before-pregnancy'),
            'pregnancyWeightCalculationWeightAfterPregnancy' => Yii::$app->request->get('weight-after-pregnancy'),
            'pregnancyWeightCalculationPregnancyWeek' => Yii::$app->request->get('pregnancy-week'),
        ];

        $childGenderRhFactorData = [
            'childGenderMotherRhFactor' => Yii::$app->request->get('mother-rh-factor'),
            'childGenderFatherRhFactor' => Yii::$app->request->get('father-rh-factor'),
        ];
        $childGenderBloodTypeData = [
            'childGenderBloodMotherType' => Yii::$app->request->get('mother-blood-type'),
            'childGenderBloodFatherType' => Yii::$app->request->get('father-blood-type'),
        ];
        $childGenderBloodRenewalData = [
            'childGenderBloodRenewalMotherBirthDate' => Yii::$app->request->get('mother-birth-date'),
            'childGenderBloodRenewalFatherBirthDate' => Yii::$app->request->get('father-birth-date'),
            'calculationDate' => $calculationDate,
        ];
        $conceptionJapanCalendarData =[
            'japanCalendarCalculationMothersMonthBirth' => Yii::$app->request->get('mother-birth'),
            'japanCalendarCalculationFathersMonthBirth' => Yii::$app->request->get('father-birth'),
            'calculationDate' => $calculationDate,
        ];
        $conceptionChineseCalendarData =[
            'chineseCalendarCalculationMothersAge' => Yii::$app->request->get('mother-age'),
            'calculationDate' => $calculationDate,
        ];
        $ovulationCalculationData = [
            'ovulationCalculationMenstrualLength' => Yii::$app->request->get('menstrual-length'),
            'ovulationCalculationCycleLength' => Yii::$app->request->get('cycle-length'),
            'calculationDate' =>$calculationDate
        ];
        $pregnancyCalculationData = [
            'pregnancyCalculationMethod' => Yii::$app->request->get('method'),
            'pregnancyCalculationDate' => $calculationDate,
        ];
        $pregnancyCalculationByFetalMovementData = [
            'pregnancyCalculationMethod' => Yii::$app->request->get('method'),
            'pregnancyCalculationDate' => $calculationDate,
        ];

        $childWeightHeightCalculationData = [
            'childGender' => Yii::$app->request->get('child-gender'),
            'childAgeYears' => Yii::$app->request->get('child-age-years'),
            'childAgeMonths' => Yii::$app->request->get('child-age-months'),
        ];

        $childHeightFutureCalculationData = [
            'childGender' => Yii::$app->request->get('child-gender'),
            'motherHeight' => Yii::$app->request->get('mother-height'),
            'fatherHeight' => Yii::$app->request->get('father-height'),
        ];

        $childEyesColorCalculationData = [
            'motherEyesColor' => Yii::$app->request->get('mother-eyes-color'),
            'fatherEyesColor' => Yii::$app->request->get('father-eyes-color'),
        ];

        $dueDateByPregnancyWeekData = [
            'dueDatePregnancyWeek' => Yii::$app->request->get('pregnancy-week'),
        ];

        $embedUrl = Yii::$app->request->get('embed-url');
        $embedTitle = Yii::$app->request->get('title');
        $pageViewData = [

            'embedUrl' => $embedUrl,
            'isEmbed' => $isEmbed,
            'embedTitle' => $embedTitle,
            'embedIframeSize' => '0',
            'embedPageTranslations' => '0',
            'embedPagesSelect' => '0',
            'currentLanguages' => $currentLanguages,
            'currentPageName' => 0,
            'allPagesData' => $allPagesData,
            'breadcrumbs' => Pages::breadcrumbs($allPages,$allPagesTranslations,$url),
            'allAdvertising' => Advertising::allAdvertising(),
            'alternate' => $alternate,
            'canonical' => $canonical,

            'allCalendarsData' => 0,
            'calculationDate' => 0,
            'model' => 0,

            'pregnancyCalculationData' => 0,
            'pregnancyCalculation' => 0,

            'pregnancyCalculationByFetalMovementData' => 0,
            'pregnancyCalculationByFetalMovement' => 0,

            'ovulationCalculationData' => 0,
            'ovulationCalendar' => 0,

            'conceptionCalendar' => 0,

            'pregnancyCalendar' => 0,

            'conceptionChineseCalendarData' => 0,
            'conceptionChineseCalendar' => 0,

            'conceptionJapanCalendarData' => 0,
            'conceptionJapanCalendar' => 0,

            'childGenderBloodRenewalData' => 0,
            'childGenderBloodRenewal' => 0,

            'childGenderBloodTypeData' => 0,
            'childGenderBloodType' => 0,

            'childGenderRhFactorData' => 0,
            'childGenderRhFactor' => 0,

            'pregnancyWeightCalculationData' => 0,
            'pregnancyWeightCalculation' => 0,

            'pregnancyUziCalculationData' => 0,
            'pregnancyUziCalculation' => 0,

            'childWeightHeightCalculationData' => 0,
            'childWeightHeightCalculation' => 0,

            'childHeightFutureCalculationData' => 0,
            'childHeightFutureCalculation' => 0,

            'childEyesColorCalculationData' => 0,
            'childEyesColorCalculation' => 0,

            'dueDateByPregnancyWeekData' => 0,
            'dueDateByPregnancyWeekCalculation' => 0,

            'conceptionDateByDueDateData' => 0,
            'conceptionDateByDueDateCalculation' => 0,


        ];



        //pregnancy-calculator
        if ($pages->id == 2) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculationData'] = $pregnancyCalculationData;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);

            return $this->render($renderPage, $pageViewData);
        }
        //calendar
        if ($pages->id == 3) {
            //echo 'мы тут';
           $pageViewData['currentPageName'] = 'calendar';
           return $this->render($renderPage, $pageViewData);
        }
        //child-gender
        if ($pages->id == 4) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender';
            return $this->render($renderPage, $pageViewData);
        }
        //due-date
        if ($pages->id == 7) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'due-date';
            return $this->render($renderPage, $pageViewData);
        }
        // pregnancy-calculator-menstrual
        if ($pages->id == 5) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-menstrual';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculationData'] = $pregnancyCalculationData;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);
            return $this->render($renderPage, $pageViewData);
        }


        //50 - pregnancy-calculator-gestational-age
        if ($pages->id == 50) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-gestational-age';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculationData'] = $pregnancyCalculationData;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);
            return $this->render($renderPage, $pageViewData);
        }

        //52 - pregnancy-calculator-conception-date-due-date
        if ($pages->id == 52) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-conception-date-due-date';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['conceptionDateByDueDateCalculation'] = WomanCalculators::conceptionDateByDueDateCalculation(
                $calculationDate);
            return $this->render($renderPage, $pageViewData);
        }



        //pregnancy-calculator-conception-date
        if ($pages->id == 6) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-conception-date';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculationData'] = $pregnancyCalculationData;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);
            return $this->render($renderPage, $pageViewData);
        }
        //pregnancy-calculator-fetal-movement
        if ($pages->id == 8) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-fetal-movement';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculationByFetalMovementData'] = $pregnancyCalculationByFetalMovementData;
            $pageViewData['pregnancyCalculationByFetalMovement'] = WomanCalculators::pregnancyCalculationByFetalMovement(
                $pregnancyCalculationByFetalMovementData['pregnancyCalculationMethod'],
                $pregnancyCalculationByFetalMovementData['pregnancyCalculationDate']);
            return $this->render($renderPage, $pageViewData);
        }

        //pregnancy-calculator-weeks
        if ($pages->id == 9) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-weeks';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalendar'] = WomanCalendars::pregnancyCalendar($pregnancyCalculationMethod,$calculationDate);
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //11 - calendar-ovulation
        if ($pages->id == 11) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-ovulation';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['ovulationCalendar'] = WomanCalendars::ovulationCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];
            return $this->render($renderPage, $pageViewData);
        }


        //49 - calendar-fertile-day
        if ($pages->id == 49) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-fertile-day';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['ovulationCalendar'] = WomanCalendars::ovulationCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];
            return $this->render($renderPage, $pageViewData);
        }


        //calendar-menstruation
        if ($pages->id == 12) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-menstruation';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalendar'] = WomanCalendars::ovulationCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];
            return $this->render($renderPage, $pageViewData);
        }

        //calendar-pregnancy
        if ($pages->id == 13) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-pregnancy';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalendar'] = WomanCalendars::pregnancyCalendar($pregnancyCalculationMethod,$calculationDate);
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($pageViewData['pregnancyCalendar']['calculationDate']),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];
            return $this->render($renderPage, $pageViewData);
        }

        //14 calendar-conception
        //15 calendar-conception-girl
        //16 calendar-conception-boy
        if (($pages->id == 14) or($pages->id == 15) or ($pages->id == 16)) {
            //echo 'мы тут';
            if ($pages->id == 14)
                $pageViewData['currentPageName'] = 'calendar-conception';
            if ($pages->id == 15)
                $pageViewData['currentPageName'] = 'calendar-conception-girl';
            if ($pages->id == 16)
                $pageViewData['currentPageName'] = 'calendar-conception-boy';

            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //17 calendar-conception-chinese
        if (($pages->id == 17)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-conception-chinese';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['conceptionChineseCalendarData'] = $conceptionChineseCalendarData;
            $pageViewData['conceptionChineseCalendar'] = WomanCalendars::conceptionChineseCalendar(
                $conceptionChineseCalendarData['chineseCalendarCalculationMothersAge'],
                $conceptionChineseCalendarData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //18 child-gender-blood-renewal
        //20 child-gender-parents-age
        if (($pages->id == 18) or ($pages->id == 20)) {
            //echo 'мы тут';
            if ($pages->id == 18)
                $pageViewData['currentPageName'] = 'child-gender-blood-renewal';
            if ($pages->id == 20)
                $pageViewData['currentPageName'] = 'child-gender-parents-age';

            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['childGenderBloodRenewalData'] = $childGenderBloodRenewalData;
            $pageViewData['childGenderBloodRenewal'] = WomanCalculators::childGenderBloodRenewal(
                $childGenderBloodRenewalData['childGenderBloodRenewalMotherBirthDate'],
                $childGenderBloodRenewalData['childGenderBloodRenewalFatherBirthDate'],
                $childGenderBloodRenewalData['calculationDate']);

            return $this->render($renderPage, $pageViewData);
        }

        //19 child-gender-blood-type
        if (($pages->id == 19)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-blood-type';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['childGenderBloodTypeData'] = $childGenderBloodTypeData;
            $pageViewData['childGenderBloodType'] = WomanCalculators::childGenderBloodType(
                $childGenderBloodTypeData['childGenderBloodMotherType'],
                $childGenderBloodTypeData['childGenderBloodFatherType']);

            return $this->render($renderPage, $pageViewData);
        }

        //21 child-gender-rh-factor
        if (($pages->id == 21)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-rh-factor';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['childGenderRhFactorData'] = $childGenderRhFactorData;
            $pageViewData['childGenderRhFactor'] = WomanCalculators::childGenderRhFactor(
                $childGenderRhFactorData['childGenderMotherRhFactor'],
                $childGenderRhFactorData['childGenderFatherRhFactor']);

            return $this->render($renderPage, $pageViewData);
        }

        //23 pregnancy-calculator-monthly
        if (($pages->id == 23)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-monthly';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);
            $pageViewData['pregnancyCalendar'] = WomanCalendars::pregnancyCalendar($pregnancyCalculationMethod,$calculationDate);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];
            return $this->render($renderPage, $pageViewData);
        }

        //24 calendar-conception-japan
        if (($pages->id == 24)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-conception-japan';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['conceptionJapanCalendarData'] = $conceptionJapanCalendarData;
            $pageViewData['conceptionJapanCalendar'] = WomanCalendars::conceptionJapanCalendar(
                $conceptionJapanCalendarData['japanCalendarCalculationMothersMonthBirth'],
                $conceptionJapanCalendarData['japanCalendarCalculationFathersMonthBirth'],
                $conceptionJapanCalendarData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //25 child-gender-chinese-table
        if (($pages->id == 25)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-chinese-table';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['conceptionChineseCalendarData'] = $conceptionChineseCalendarData;
            $pageViewData['conceptionChineseCalendar'] = WomanCalendars::conceptionChineseCalendar(
                $conceptionChineseCalendarData['chineseCalendarCalculationMothersAge'],
                $conceptionChineseCalendarData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //26 child-gender-japan-table
        if (($pages->id == 26)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-japan-table';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['conceptionJapanCalendarData'] = $conceptionJapanCalendarData;
            $pageViewData['conceptionJapanCalendar'] = WomanCalendars::conceptionJapanCalendar(
                $conceptionJapanCalendarData['japanCalendarCalculationMothersMonthBirth'],
                $conceptionJapanCalendarData['japanCalendarCalculationFathersMonthBirth'],
                $conceptionJapanCalendarData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //27 child-gender-conception-date
        if (($pages->id == 27)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-conception-date';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //28 child-gender-latest-menstrual
        if (($pages->id == 28)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-latest-menstrual';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }


        //48 child-gender-ovulation
        if (($pages->id == 48)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-gender-ovulation';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }


        //29 due-date-menstrual
        if (($pages->id == 29)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'due-date-menstrual';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);

            return $this->render($renderPage, $pageViewData);
        }


        //51 due-date-pregnancy-week
        if (($pages->id == 51)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'due-date-pregnancy-week';
            $pageViewData['dueDateByPregnancyWeekData'] = $dueDateByPregnancyWeekData;
            $pageViewData['dueDateByPregnancyWeekCalculation'] = WomanCalculators::dueDateByPregnancyWeekCalculation(
                $dueDateByPregnancyWeekData['dueDatePregnancyWeek']);

            return $this->render($renderPage, $pageViewData);
        }




        //30 due-date-conception-date
        if (($pages->id == 30)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'due-date-conception-date';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyCalculation'] = WomanCalculators::pregnancyCalculation(
                $pregnancyCalculationData['pregnancyCalculationMethod'],
                $calculationDate);

            return $this->render($renderPage, $pageViewData);
        }

        //31 pregnancy-calculator-weight
        if (($pages->id == 31)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-weight';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyWeightCalculationData'] = $pregnancyWeightCalculationData;
            $pageViewData['pregnancyWeightCalculation'] = WomanCalculators::pregnancyWeightCalculation(
                $pregnancyWeightCalculationData['pregnancyWeightCalculationWeightBeforePregnancy'],
                $pregnancyWeightCalculationData['pregnancyWeightCalculationWeightAfterPregnancy'],
                $pregnancyWeightCalculationData['pregnancyWeightCalculationPregnancyWeek']);

            return $this->render($renderPage, $pageViewData);
        }

        //33 calendar-safe-days
        if (($pages->id == 33)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-safe-days';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }

        //34 pregnancy-calculator-uzi
        if (($pages->id == 34)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'pregnancy-calculator-uzi';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['pregnancyUziCalculationData'] = $pregnancyUziCalculationData;
            $pageViewData['pregnancyUziCalculation'] = WomanCalculators::pregnancyUziCalculation(
                $pregnancyUziCalculationData['pregnancyUziCalculationFetalLength']);

            return $this->render($renderPage, $pageViewData);
        }


        //35 child-height-weight
        if (($pages->id == 35)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-height-weight';
            $pageViewData['childWeightHeightCalculationData'] = $childWeightHeightCalculationData;
            $pageViewData['childWeightHeightCalculation'] = WomanCalculators::childWeightHeightCalculation(
                $childWeightHeightCalculationData['childGender'],
                $childWeightHeightCalculationData['childAgeYears'],
                $childWeightHeightCalculationData['childAgeMonths']);

            return $this->render($renderPage, $pageViewData);
        }


        //40 child-height-future
        if (($pages->id == 40)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'child-height-future';
            $pageViewData['childHeightFutureCalculationData'] = $childHeightFutureCalculationData;
            $pageViewData['childHeightFutureCalculation'] = WomanCalculators::childHeightFutureCalculation(
                $childHeightFutureCalculationData['childGender'],
                $childHeightFutureCalculationData['motherHeight'],
                $childHeightFutureCalculationData['fatherHeight']);

            return $this->render($renderPage, $pageViewData);
        }


        //37 child-eyes-color
        if (($pages->id == 37)) {
            //echo 'мы тут'
            $pageViewData['currentPageName'] = 'child-eyes-color';
            $pageViewData['childEyesColorCalculationData'] = $childEyesColorCalculationData;
            $pageViewData['childEyesColorCalculation'] = WomanCalculators::childEyesColorCalculation(
                $childEyesColorCalculationData['motherEyesColor'],
                $childEyesColorCalculationData['fatherEyesColor']);

            return $this->render($renderPage, $pageViewData);
        }

        //41 cms-donation
        //42 cms-cookie
        //43 cms-policy
        //44 cms-translation
        //45 cms-contact
        //47 cms-embed
        if (($pages->id == 41) or
            ($pages->id == 42) or
            ($pages->id == 43) or
            ($pages->id == 44) or
            ($pages->id == 45)
            or ($pages->id == 47)
        ) {
            //echo 'мы тут';
            if ($pages->id == 41)
                $pageViewData['currentPageName'] = 'cms-donation';
            if ($pages->id == 42)
                $pageViewData['currentPageName'] = 'cms-cookie';
            if ($pages->id == 43)
                $pageViewData['currentPageName'] = 'cms-policy';
            if ($pages->id == 44)
                $pageViewData['currentPageName'] = 'cms-translation';
            if ($pages->id == 45)
                $pageViewData['currentPageName'] = 'cms-contact';
            if ($pages->id == 47) {
                $pageViewData['currentPageName'] = 'cms-embed';


                if ($embedUrl) {
                    if(!Pages::find()->andWhere(['url' => $embedUrl])->andWhere(['embed' => 1])->one()){
                        throw new NotFoundHttpException('404');
                    }
                    $pageViewData['embedPageTranslations'] = Pages::onePagesTranslations($currentLanguages->id, $embedUrl);
                    $pageViewData['embedIframeSize'] = WomanCalculators::embedIframeSize($embedUrl);

                }

                $pageViewData['embedPagesSelect'] = Pages::embedPagesSelect($allPages,$allPagesTranslations);

            }



            $model = new Mail();
            $pageViewData['model'] = $model;

            if ($model->load(Yii::$app->request->post()) && $_POST['Mail']['check'] === 'nospam'){

                if ($model->validate() && $model->save()){
                    $model->contact(Yii::$app->params['emailto']);
                    Yii::$app->session->setFlash('success', 'send');
                    //$pageViewData['successMess'] = true
                    $this->refresh();
                    return false;
                }
                
            }

            return $this->render($renderPage, $pageViewData);
        }



        //53 calendar-child-gender
        if (($pages->id == 53)) {
            //echo 'мы тут';
            $pageViewData['currentPageName'] = 'calendar-child-gender';
            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];

            return $this->render($renderPage, $pageViewData);
        }





       throw new NotFoundHttpException('404');

    }

    /*
     * actionPrint работает только mpdf не может вывести правильно отформатированный мной календарь
     * все Стили css рабоатют не правильно, без mpdf эта часть отображается правильно.
     */
/*
    public function actionPrint($url){

        // Переменные и настройки для текстов всех страниц сайта

        if (!Yii::$app->request->get('date')){

            $calculationDate = WomanCalculators::todayDate('0');

        } else {

            $calculationDate = Yii::$app->request->get('date');

        }
        $currentLanguages = Pages::currentLanguages();
        $allPages = Pages::allPages();
        $allPagesTranslations = Pages::allPagesTranslations($currentLanguages->id);
        $pages = Pages::find()->andWhere(['url' => $url])->one();
        $pregnancyCalculationMethod = Yii::$app->request->get('method');

        $allPagesData = [
            'pages' => $pages,
            'pagesTranslations' => Pages::onePagesTranslations($currentLanguages->id,$url),
            'parentPageCategories' => Pages::parentPageCategories($allPages, $allPagesTranslations,$url),
            'languagesSwitcher' => Pages::languagesSwitcher(),
            'currentLanguages' => $currentLanguages,
            'menuItems' => Pages::menuItems($allPages, $allPagesTranslations),
        ];

        // Переменные и настройки для текстов всех страниц сайта

        $conceptionJapanCalendarData =[
            'japanCalendarCalculationMothersMonthBirth' => Yii::$app->request->get('mother-birth'),
            'japanCalendarCalculationFathersMonthBirth' => Yii::$app->request->get('father-birth'),
            'calculationDate' => $calculationDate,
        ];

        $conceptionChineseCalendarData =[
            'chineseCalendarCalculationMothersAge' => Yii::$app->request->get('mother-age'),
            'calculationDate' => $calculationDate,
        ];

        $ovulationCalculationData = [
            'ovulationCalculationMenstrualLength' => Yii::$app->request->get('menstrual-length'),
            'ovulationCalculationCycleLength' => Yii::$app->request->get('cycle-length'),
            'calculationDate' => $calculationDate
        ];
        $pregnancyCalculationData = [
            'pregnancyCalculationMethod' => Yii::$app->request->get('method'),
            'pregnancyCalculationDate' => $calculationDate,
        ];



        $pageViewData = [
            'currentLanguages' => $currentLanguages,
            'currentPageName' => 0,
            'allPagesData' => $allPagesData,
            'breadcrumbs' => Pages::breadcrumbs($allPages,$allPagesTranslations,$url),
            'allAdvertising' => Advertising::allAdvertising(),
            'allCalendarsData' => 0,
            'calculationDate' => 0,


            'pregnancyCalculationData' => 0,
            'pregnancyCalculation' => 0,

            'pregnancyCalculationByFetalMovementData' => 0,
            'pregnancyCalculationByFetalMovement' => 0,

            'ovulationCalculationData' => 0,
            'ovulationCalendar' => 0,

            'conceptionCalendar' => 0,

            'pregnancyCalendar' => 0,

            'conceptionChineseCalendarData' => 0,
            'conceptionChineseCalendar' => 0,

            'conceptionJapanCalendarData' => 0,
            'conceptionJapanCalendar' => 0,

            'childGenderBloodRenewalData' => 0,
            'childGenderBloodRenewal' => 0,

            'childGenderBloodTypeData' => 0,
            'childGenderBloodType' => 0,

            'childGenderRhFactorData' => 0,
            'childGenderRhFactor' => 0,

            'pregnancyWeightCalculationData' => 0,
            'pregnancyWeightCalculation' => 0,

            'pregnancyUziCalculationData' => 0,
            'pregnancyUziCalculation' => 0,

            'childWeightHeightCalculationData' => 0,
            'childWeightHeightCalculation' => 0,

            'childHeightFutureCalculationData' => 0,
            'childHeightFutureCalculation' => 0,

            'childEyesColorCalculationData' => 0,
            'childEyesColorCalculation' => 0,

        ];

        //14 calendar-conception
        //15 calendar-conception-girl
        //16 calendar-conception-boy

        if (($pages->id == 14) or($pages->id == 15) or ($pages->id == 16)) {
            //echo 'мы тут';
            if ($pages->id == 14)
                $pageViewData['currentPageName'] = 'calendar-conception';
            if ($pages->id == 15)
                $pageViewData['currentPageName'] = 'calendar-conception-girl';
            if ($pages->id == 16)
                $pageViewData['currentPageName'] = 'calendar-conception-boy';

            $pageViewData['calculationDate'] = $calculationDate;
            $pageViewData['ovulationCalculationData'] = $ovulationCalculationData;
            $pageViewData['conceptionCalendar'] = WomanCalendars::conceptionCalendar(
                $ovulationCalculationData['ovulationCalculationMenstrualLength'],
                $ovulationCalculationData['ovulationCalculationCycleLength'],
                $ovulationCalculationData['calculationDate']);
            $pageViewData['allCalendarsData'] = [
                'nameOfMonthsInYear' => WomanCalendars::nameOfMonthsInYear($calculationDate),
                'nameOfDaysInWeek' => WomanCalendars::nameOfDaysInWeek(),
            ];


            return $this->render('/pages/calendar-parts/print.php',$pageViewData);

        }

        $print = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'tempDir' => __DIR__ . '/../tmp', // uses the current directory's parent "tmp" subfolder
            'setAutoTopMargin' => 'stretch',
            'setAutoBottomMargin' => 'stretch'
        ]);


        $print->writeHTML($printContent);
        $print->Output();
        exit;

    }
    */

    /*
   *  Здесь выводится один элемент блога
   */

 /*   public function actionOne($url)
    {
       if($page = Pages::find()->andWhere(['url' => $url])->one()){

           return $this->render('one', ['page' => $page]);

       }

       throw new NotFoundHttpException('ой, нет такого блога.');

    }*/

}

<?php

namespace common\models\components;

use common\models\components\WomanCalculatorsDataArrays;
use common\models\Pages;
use Faker\Provider\tr_TR\DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property mixed $pagesText
 * @property mixed $pagesTextAll
 * @property mixed $statusName
 * @property mixed $statusNameMenu
 * @property mixed $onPagesText
 * @property mixed $languages
 * @property mixed $pagesTextId
 * @property mixed $allPages
 * @property int $active
 */




class WomanCalculators extends Pages
{

    /*
        * по шевелению плода
        * 20 недель или 140 дней если первый ребенок
        * 22 недели или 154 дня если второй ребенок
     *
     *
        */

    public function pregnancyCalculationByFetalMovement($pregnancyCalculationMethod, $pregnancyCalculationDate){



        if ($pregnancyCalculationMethod==3){

            $daysToDueDate = 140;

        } else {

            $daysToDueDate = 154;

        }

        if (!$pregnancyCalculationMethod){

            $pregnancyCalculationDivShow = false;

        }else{

            $pregnancyCalculationDivShow = true;

        }


        $pregnancyCalculationDateInverse = implode('-', array_reverse(explode('-', $pregnancyCalculationDate)));
        $dueDate = new \DateTime($pregnancyCalculationDateInverse);
        $dueDate->add(new \DateInterval('P' . $daysToDueDate . 'D'));

        $todayDate = new \DateTime();
        $pregnancyWeeks = 0;
        $pregnancyDays = 0;
        $pregnancyBeginDate = new \DateTime($pregnancyCalculationDateInverse);
        $differenceBetweenTodayAndChosenDay = $pregnancyBeginDate->diff($todayDate);
        $differenceBetweenTodayAndChosenDay = $differenceBetweenTodayAndChosenDay->format("%a");
        $pregnancyDays =  $daysToDueDate;
        //echo $pregnancyWeeks . '<br>';
        //echo $pregnancyDays . '<br>';
        $pregnancyCalculationDate = new \DateTime($pregnancyCalculationDateInverse);

        $pregnancyCalculationException = 'echoWeeks';

        if ($todayDate->format('Y-m-d') <= $pregnancyCalculationDate->format('Y-m-d')) {

            //echo 'Сегодняшняя дата меньше чем выбранная';
            if ($pregnancyCalculationMethod == 3) {

                if ($differenceBetweenTodayAndChosenDay >= 0 && $differenceBetweenTodayAndChosenDay < 140) {
                    $pregnancyDays-=$differenceBetweenTodayAndChosenDay;
                    $pregnancyCalculationException = 'echoWeeks';

                } else{

                    $pregnancyCalculationException = 'echoPlanning';

                }

            } else {

                //echo $pregnancyDays;

                if ($differenceBetweenTodayAndChosenDay >= 0 && $differenceBetweenTodayAndChosenDay < 154) {

                    $pregnancyDays-=$differenceBetweenTodayAndChosenDay;
                    $pregnancyCalculationException = 'echoWeeks';

                } else {
                    $pregnancyCalculationException = 'echoPlanning';
                }

            }

        } else {

            if ($pregnancyCalculationMethod == 3) {

                if ($differenceBetweenTodayAndChosenDay >= 0 && $differenceBetweenTodayAndChosenDay < 140) {
                    $pregnancyDays+=$differenceBetweenTodayAndChosenDay;
                    $pregnancyCalculationException = 'echoWeeks';

                } else{

                    $pregnancyCalculationException = 'echoHaveBaby';

                }

            } else {

                //echo $pregnancyDays;

                if ($differenceBetweenTodayAndChosenDay >= 0 && $differenceBetweenTodayAndChosenDay < 154) {

                    $pregnancyDays+=$differenceBetweenTodayAndChosenDay;
                    $pregnancyCalculationException = 'echoWeeks';

                } else {

                    $pregnancyCalculationException = 'echoHaveBaby';
                }

            }

        }



        $pregnancyWeeks = $pregnancyDays / 7;
        if ($pregnancyCalculationMethod == 3) {

            $pregnancyWeeks = ceil($pregnancyWeeks) ;

        } else {

            $pregnancyWeeks = ceil($pregnancyWeeks);

        }
        /*
        echo 'Дней беременности ' . $pregnancyDays . '<br>';
        echo  'недель беременности ' . $pregnancyWeeks . '<br>';
        echo  'разница беременности ' . $differenceBetweenTodayAndChosenDay . '<br>';
        echo  'дней до рождения ' .  $daysToDueDate . '<br>';
        */
        return [

            'dueDate' => Yii::$app->formatter->asDate($dueDate->format('Y-m-d'),'long'),
            'pregnancyWeeks' => $pregnancyWeeks,
            'pregnancyCalculationException' => $pregnancyCalculationException,
            'pregnancyCalculationDivShow' => $pregnancyCalculationDivShow,
            'pregnancyCalculationMethod' => $pregnancyCalculationMethod,

        ];
    }

    /*
     * Для того чтобы форматор дат выводил необходимый язык
     * например текущий то нужно чтобы было установлено для php.ini extension=php_intl.dll
     * https://stackoverflow.com/questions/6242378/fatal-error-class-intldateformatter-not-found
     * Возможно его нужно будет установить  sudo apt install php7.3-intl как я и сделал.
     *
     */

    /*
         * по датам
         * 266 дней от даты зачатия
         * 280 дней от последней менструации
         *
         * по шевелению плода
         * 20 недель или 140 дней если первый ребенок
         * 22 недели или 154 дня если второй ребенок
         */

    public function pregnancyCalculation($pregnancyCalculationMethod,$pregnancyCalculationDate){

        if ($pregnancyCalculationMethod==1){

            $daysToDueDate = 280;

        } elseif ($pregnancyCalculationMethod==2){

            $daysToDueDate = 266;

        } elseif ($pregnancyCalculationMethod==3){

            $daysToDueDate = 140;

        } else {

            $daysToDueDate = 154;

        }

        if (!$pregnancyCalculationMethod) {

            $pregnancyCalculationDivShow = false;
            $daysToDueDate = 280;

        } else {

            $pregnancyCalculationDivShow = true;

        }


        $pregnancyCalculationDateInverse = implode('-', array_reverse(explode('-', $pregnancyCalculationDate)));
        $dueDate = new \DateTime($pregnancyCalculationDateInverse);
        $dueDate->add(new \DateInterval('P' . $daysToDueDate . 'D'));



        $todayDate = new \DateTime();
        $now = time();
        $pregnancyBeginDate = new \DateTime($pregnancyCalculationDateInverse);
        $pregnancyCalculationException = 'echoWeeks';
        $pregnancyWeeks = 0;


        if ($pregnancyCalculationMethod==1) {

            $pregnancyCalculationStartDate = new \DateTime($pregnancyCalculationDateInverse);
            //echo 'Выбранная дата ' . $pregnancyCalculationStartDate->format('Y-m-d') . '<br>';

            $datediff = $now - strtotime($pregnancyCalculationStartDate->format('Y-m-d'));
            $datediff = ($datediff / (60 * 60 * 24));
            //echo 'в днях между сейчас и выбранной датой ' . $datediff . '<br>';

            if ($datediff<0){
                // Если мы указали будущую дату завтра допустим или еще дальше то мы планируем беременность
                $pregnancyCalculationException = 'echoPlanning';

            } else {
                // Если мы указали дату предидущего дня или неделей ранее или месяцем ранее то считаем сколько дней и недель беременность.
                $pregnancyDaysMethodOne = ceil($datediff);
                //echo 'в днях между сейчас и выбранной датой округлено ' . $pregnancyDaysMethodOne . '<br>';
                //echo 'Количество недель ' . ($pregnancyDaysMethodOne / 7) . '<br>';
                $pregnancyWeeksMethodOne = ceil($pregnancyDaysMethodOne / 7);
                //echo 'Количество целых недель ' . $pregnancyWeeksMethodOne . '<br>';
                $pregnancyWeeks =  $pregnancyWeeksMethodOne;
                //echo 'Количество целых недель ' . $pregnancyWeeks . '<br>';

                if ($pregnancyWeeks > 40) {
                    $pregnancyCalculationException = 'echoHaveBaby';
                }

            }

        }

        if ($pregnancyCalculationMethod==2) {

            $pregnancyDaysMethodTwo = 14;

            $pregnancyCalculationStartDate = new \DateTime($pregnancyCalculationDateInverse);
            //echo 'Выбранная дата ' . $pregnancyCalculationStartDate->format('Y-m-d') . '<br>';

            $datediff = $now - strtotime($pregnancyCalculationStartDate->format('Y-m-d'));
            $datediff = ($datediff / (60 * 60 * 24));
            //echo 'в днях между сейчас и выбранной датой ' . $datediff . '<br>';

            if ($datediff<0){
                // Если мы указали будущую дату завтра допустим или еще дальше то
                // у нас есть 2 недели запас то есть в методе 2 беременность отсчитывается
                // + 2 недели к выбранной дате зачатия

                $datediff = abs($datediff);
                //echo 'разница преобразованная в положительное число  ' . $datediff . '<br>';
                $datediff = ceil($datediff);
                //echo 'Количество дней разницы  ' . $datediff . '<br>';


                if ($datediff>14){

                    $pregnancyCalculationException = 'echoPlanning';

                } else {

                    $pregnancyDaysMethodTwo = $pregnancyDaysMethodTwo - $datediff;
                    //echo 'Срок беременности  ' . $pregnancyDaysMethodTwo . '<br>';
                    $pregnancyWeeksMethodTwo = ceil($pregnancyDaysMethodTwo / 7);
                    //echo 'Срок беременности недель  ' . $pregnancyWeeksMethodTwo . '<br>';
                    $pregnancyWeeks =  $pregnancyWeeksMethodTwo;
                    if ($pregnancyWeeks > 40) {
                        $pregnancyCalculationException = 'echoHaveBaby';
                    }
                }

            } else {
                // Если мы указали дату предыдущего дня или неделей ранее или месяцем ранее то считаем сколько дней и недель беременность.
                $pregnancyDaysMethodTwo = $pregnancyDaysMethodTwo + ceil($datediff)-1;
                //echo 'в днях между сейчас и выбранной датой округлено + 2 недели ' . $pregnancyDaysMethodTwo . '<br>';
                //echo 'Количество недель ' . ($pregnancyDaysMethodTwo / 7) . '<br>';
                $pregnancyWeeksMethodTwo = ceil($pregnancyDaysMethodTwo / 7);
                // echo 'Количество целых недель ' . $pregnancyWeeksMethodTwo . '<br>';
                $pregnancyWeeks =  $pregnancyWeeksMethodTwo;
                if ($pregnancyWeeks > 40) {
                    $pregnancyCalculationException = 'echoHaveBaby';
                }
            }

        }



         // текущее время (метка времени)
        $your_date = strtotime($pregnancyCalculationDateInverse); // какая-то дата в строке (1 января 2017 года)

        $pregnancyDays = $todayDate->diff($pregnancyBeginDate);
        //echo 'Дней беременности ' . $pregnancyDays->format("%a") . '<br>';
        $pregnancyDays = $pregnancyDays->format("%a");
        $pregnancyDays++;
        //$pregnancyDaysSecondMethod = $pregnancyDays+13;

        //echo 'Дней беременности ' . $pregnancyDays . '<br>';
        //echo 'Дней беременности 2 метод ' . $pregnancyDaysSecondMethod . '<br>';

        //$pregnancyWeeks = $pregnancyDays / 7;
        $pregnancyMonths = 0;
        $pregnancyCalculationExceptionMonth = 0;

        if ($pregnancyDays > 0 && $pregnancyDays <= 28) {
            $pregnancyMonths = 1;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 28 && $pregnancyDays <= 62) {
            $pregnancyMonths = 2;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 62 && $pregnancyDays <= 93) {
            $pregnancyMonths = 3;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 93 && $pregnancyDays <= 124) {
            $pregnancyMonths = 4;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 124 && $pregnancyDays <= 155) {
            $pregnancyMonths = 5;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 155 && $pregnancyDays <= 185) {
            $pregnancyMonths = 6;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 185 && $pregnancyDays <= 216) {
            $pregnancyMonths = 7;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 216 && $pregnancyDays <= 249) {
            $pregnancyMonths = 8;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 249 && $pregnancyDays <= 280) {
            $pregnancyMonths = 9;
            $pregnancyCalculationExceptionMonth = 'echoMonths';
        } elseif ($pregnancyDays > 280) {
            $pregnancyMonths = 10;
            $pregnancyCalculationExceptionMonth = 'echoHaveBaby';
        }
        if ($pregnancyDays < 0) {
            $pregnancyCalculationExceptionMonth = 'echoPlanning';
            $pregnancyMonths = 0;
        }


        //echo $pregnancyWeeks . '<br>';

        /*
        $pregnancyCalculationDate = new \DateTime($pregnancyCalculationDateInverse);

        if ($todayDate->format('Y-m-d') <= $pregnancyCalculationDate->format('Y-m-d')) {

            //echo 'Сегодняшняя дата меньше чем выбранная';
            if ($pregnancyCalculationMethod == 1) {

                $pregnancyCalculationException = 'echoPlanning';

            } else {

                //echo $pregnancyDays;

                if ($pregnancyDays > 0 && $pregnancyDays < 7) {

                    $pregnancyWeeks = 1;
                    $pregnancyCalculationException = 'echoWeeks';

                } elseif ($pregnancyDays > 6) {

                    $pregnancyCalculationException = 'echoPlanning';
                }

            }

        } else {

            // echo 'Сегодняшняя дата больше чем выбранная';
            if ($pregnancyWeeks > 40) {
                $pregnancyCalculationException = 'echoHaveBaby';
            }

        }*/

        //echo 'Количество целых недель ' . $pregnancyWeeks . '<br>';

        return [

            'dueDate' => Yii::$app->formatter->asDate($dueDate->format('Y-m-d'), 'long'),
            'pregnancyWeeks' => $pregnancyWeeks,
            'pregnancyMonths' => $pregnancyMonths,
            'pregnancyCalculationException' => $pregnancyCalculationException,
            'pregnancyCalculationDivShow' => $pregnancyCalculationDivShow,
            'pregnancyCalculationMethod' => $pregnancyCalculationMethod,
            'pregnancyCalculationExceptionMonth' => $pregnancyCalculationExceptionMonth,

        ];

    }


    /*
     * Длительность обновления крови матери 3 года
     * Длительность обновления крови отца 4 года
     *
     */

    public function childGenderBloodRenewal($motherBirthDate,$fatherBirthDate,$calculationDate){



        $calculationDateInverse = implode('-', array_reverse(explode('-', $calculationDate)));
        //echo $fatherBirthDate . '<br>';


        $calculationDate = new \DateTime($calculationDate);
        $fatherBirthDate = new \DateTime($fatherBirthDate);
        $motherBirthDate = new \DateTime($motherBirthDate);
        //echo 'Дата рождения папы ' .  $fatherBirthDate->format('Y-m-d') . '<br>';
        //echo 'Дата рождения мамы ' .  $motherBirthDate->format('Y-m-d') . '<br>';
        $countDaysFromFatherBirthDateToCalculationDate = $fatherBirthDate->diff($calculationDate);
        $countDaysFromFatherBirthDateToCalculationDate = $countDaysFromFatherBirthDateToCalculationDate->format('%a');
        $countFatherBloodRenewalFullTimes = (int) ($countDaysFromFatherBirthDateToCalculationDate/365/4);
        $countFatherBloodRenewalFullYears = $countFatherBloodRenewalFullTimes * 4;
        $fatherBirthDate->modify( "+ $countFatherBloodRenewalFullYears year");
        //echo 'Дата последнего обновления крови папы ' . $fatherBirthDate->format('Y-m-d') . '<br>';
        $countDaysFromFatherLastBloodRenewal = $fatherBirthDate->diff($calculationDate);

        $countDaysFromFatherLastBloodRenewal = $countDaysFromFatherLastBloodRenewal->format('%a');
        //echo 'Прошло дней от последнего обновления крови папы ' . $countDaysFromFatherLastBloodRenewal . '<br>';
        //echo $fatherBirthDate->format('Y-m-d') . '<br>';
        //echo $countDaysFromFatherLastBloodRenewal . '<br>';

        $countDaysFromMotherBirthDateToCalculationDate = $motherBirthDate->diff($calculationDate);
        $countDaysFromMotherBirthDateToCalculationDate = $countDaysFromMotherBirthDateToCalculationDate->format('%a');
        $countMotherBloodRenewalFullTimes = (int) ($countDaysFromMotherBirthDateToCalculationDate/365/3);
        $countMotherBloodRenewalFullYears = $countMotherBloodRenewalFullTimes * 3;
        $motherBirthDate->modify( "+ $countMotherBloodRenewalFullYears year");
        //echo 'Дата последнего обновления крови мамы' .  $motherBirthDate->format('Y-m-d') . '<br>';
        $countDaysFromMotherLastBloodRenewal = $motherBirthDate->diff($calculationDate);
        $countDaysFromMotherLastBloodRenewal = $countDaysFromMotherLastBloodRenewal->format('%a');
        //echo 'Прошло дней от последнего обновления крови мамы ' . $countDaysFromMotherLastBloodRenewal . '<br>';
        //echo $motherBirthDate->format('Y-m-d') . '<br>';
        //echo $countDaysFromMotherLastBloodRenewal . '<br>';

        // Если количество дней прошедших с последнего обновления крови матери больше чем
        // количество дней прошедних с последнего обновления крови отца то родиться девочка иначе мальчик
        if ($countDaysFromMotherLastBloodRenewal > $countDaysFromFatherLastBloodRenewal){

            $childGender = 'b';

        }else{

            $childGender = 'g';

        }

        // Если задана сегодняшняя дата для всего то ничего не выводим.
        if ($countDaysFromMotherLastBloodRenewal == 0) {

            $childGender = 'n';

        }

    return [
        'childGender' => $childGender,
        'countDaysFromMotherLastBloodRenewal' => $countDaysFromMotherLastBloodRenewal,
        'countDaysFromFatherLastBloodRenewal' => $countDaysFromFatherLastBloodRenewal,
        'fatherLastRenewalDate' => $fatherBirthDate->format('Y-m-d'),
        'motherLastRenewalDate' => $motherBirthDate->format('Y-m-d'),
    ];


    }

    /*
     * Определение пола ребенка по типу прови родителей
     */

    public function childGenderBloodType($motherBloodType,$fatherBloodType){

        if (!$motherBloodType) {

            $motherBloodType = 0;
            $fatherBloodType = 0;

        }

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $childGenderBloodType = $womanCalculatorsDataArrays->childGenderBloodType();
        //echo 'Тип крови мамы  ' .  $motherBloodType . '<br>';
        //echo 'Тип крови папы  ' .  $fatherBloodType . '<br>';
        //echo 'Пол ребенка  ' .  $childGender[$motherBloodType][$fatherBloodType] . '<br>';


        return $childGenderBloodType[$motherBloodType][$fatherBloodType];

   }

    /*
     * Определение пола ребенка по положительной отрицательной крови родителей
     */

    public function childGenderRhFactor($motherRhFactor,$fatherRhFactor){

        if (!$motherRhFactor) {

            $motherRhFactor = 0;
            $fatherRhFactor = 0;

        }

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $childGenderRhFactor = $womanCalculatorsDataArrays->childGenderRhFactor();


        //echo 'Тип крови мамы  ' .  $motherRhFactor . '<br>';
        //echo 'Тип крови папы  ' .  $fatherRhFactor . '<br>';
        //echo 'Пол ребенка  ' .  $childGender[$motherRhFactor][$fatherRhFactor] . '<br>';


        return $childGenderRhFactor[$motherRhFactor][$fatherRhFactor];

    }

    /*
     * Определение правильного веса беременности.
     */

    public function pregnancyWeightCalculation($weightBeforePregnancy,$weightAfterPregnancy,$pregnancyWeek){

        $viewResult =1;

        if (!$weightBeforePregnancy){
            $weightBeforePregnancy=0;
            $weightAfterPregnancy=0;
            $pregnancyWeek=0;
            $viewResult = 0;
        }

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $pregnancyWeeks = $womanCalculatorsDataArrays->pregnancyWeeks();

        $pregnancyWeightShouldBe = round($weightBeforePregnancy + $pregnancyWeeks[$pregnancyWeek]['weightGain']/1000,1);
        $pregnancyWeightDifference = $weightAfterPregnancy - $pregnancyWeightShouldBe;

        //echo 'viewResult  ' .  $viewResult . '<br>';
        //echo '$pregnancyWeek  ' .  $pregnancyWeek . '<br>';
        //echo '$weightAfterPregnancy  ' .  $weightAfterPregnancy . '<br>';
        //echo '$pregnancyWeightShouldBe  ' .  $pregnancyWeightShouldBe . '<br>';
        //echo '$pregnancyWeightDifference  ' .  $pregnancyWeightDifference . '<br>';
        //echo '$pregnancyWeeks[$pregnancyWeek][\'fetusHeight\']  ' .  $pregnancyWeeks[$pregnancyWeek]['fetusHeight'] . '<br>';
        //echo '$pregnancyWeeks[$pregnancyWeek][\'fetusWeight\']  ' .  $pregnancyWeeks[$pregnancyWeek]['fetusWeight'] . '<br>';
        //echo '$pregnancyWeeks[$pregnancyWeek][\'fetusHeadSize\']  ' .  $pregnancyWeeks[$pregnancyWeek]['fetusHeadSize'] . '<br>';
        //echo '$pregnancyWeeks[$pregnancyWeek][\'fetusHipLength\']  ' .  $pregnancyWeeks[$pregnancyWeek]['fetusHipLength'] . '<br>';
        //echo '$pregnancyWeeks[$pregnancyWeek][\'fetusChestDiameter\']  ' .  $pregnancyWeeks[$pregnancyWeek]['fetusChestDiameter'] . '<br>';

        return [
            'viewResult' => $viewResult,
            'pregnancyWeek' => $pregnancyWeek,
            'pregnancyWeight' => $weightAfterPregnancy,
            'pregnancyWeightShouldBe' => $pregnancyWeightShouldBe,
            'pregnancyDifference' => $pregnancyWeightDifference,
            'fetusHeight' => $pregnancyWeeks[$pregnancyWeek]['fetusHeight'],
            'fetusWeight' => $pregnancyWeeks[$pregnancyWeek]['fetusWeight'],
            'fetusHeadSize' => $pregnancyWeeks[$pregnancyWeek]['fetusHeadSize'],
            'fetusHipLength' => $pregnancyWeeks[$pregnancyWeek]['fetusHipLength'],
            'fetusChestDiameter' => $pregnancyWeeks[$pregnancyWeek]['fetusChestDiameter'],
        ];
    }

    /*
     * Определение недели беременности по результатам узи
     */

    public function pregnancyUziCalculation($fetusLength){

        $viewResult =1;

        if (!$fetusLength){
            $fetusLength = 0;
            $viewResult = 0;
        }

        //Скрыт массив с данными о неделе и весе плода
        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        //$pregnancyWeeks = $womanCalculatorsDataArrays->pregnancyWeeks();
        $pregnancyFetalLength = $womanCalculatorsDataArrays->pregnancyFetalLength();

        if ($fetusLength>=3 && $fetusLength<=84){

                $return = $pregnancyFetalLength[$fetusLength];

        } else{

                $viewResult = 0;
                $return = 0;

            }

        if ($viewResult==0){

                $return = 0;

        }

      return [
            'viewResult' => $viewResult,
            'pregnancyWeek' => $return,
        ];
    }

    /*
     * Калькулятор веса и роста ребенка
     */

    public function childWeightHeightCalculation($childGender,$childAgeYears,$childAgeMonths){
        $viewResult = 1;
        if (!$childGender){
            $childGender = 1;
            $childAgeYears = 1;
            $childAgeMonths = 1;
            $viewResult = 0;
        }

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $girlsHeight = $womanCalculatorsDataArrays->girlsHeight();
        $girlsWeight = $womanCalculatorsDataArrays->girlsWeight();
        $girlsHead = $womanCalculatorsDataArrays->girlsHead();
        $boysHeight = $womanCalculatorsDataArrays->boysHeight();
        $boysWeight = $womanCalculatorsDataArrays->boysWeight();
        $boysHead = $womanCalculatorsDataArrays->boysHead();
        //echo print_r($girlsHeight);
        /*echo $girlsHeight[1][5][0] . '<br>';
        echo $girlsWeight[1][5][0] . '<br>';
        echo $girlsHead[1][5][0] . '<br>';
        echo $boysHeight[1][5][0] . '<br>';
        echo $boysWeight[1][5][0] . '<br>';
        echo $boysHead[1][5][0] . '<br>';*/

        if (!isset($boysHeight[$childAgeYears][$childAgeMonths][3])){
            $boysHeight = 0;
        } else {
            $boysHeight = $boysHeight[$childAgeYears][$childAgeMonths][3];
        }

        if (!isset($boysWeight[$childAgeYears][$childAgeMonths][3])){
            $boysWeight = 0;
        } else {
            $boysWeight = $boysWeight[$childAgeYears][$childAgeMonths][3];
        }

        if (!isset($boysHead[$childAgeYears][$childAgeMonths][3])){
            $boysHead = 0;
        } else {
            $boysHead = $boysHead[$childAgeYears][$childAgeMonths][3];
        }

        if (!isset($girlsHeight[$childAgeYears][$childAgeMonths][3])){
            $girlsHeight = 0;
        } else {
            $girlsHeight = $girlsHeight[$childAgeYears][$childAgeMonths][3];
        }

        if (!isset($girlsWeight[$childAgeYears][$childAgeMonths][3])){
            $girlsHeight = 0;
        } else {
            $girlsWeight = $girlsWeight[$childAgeYears][$childAgeMonths][3];
        }

        if (!isset($girlsHead[$childAgeYears][$childAgeMonths][3])){
            $girlsHead = 0;
        } else {
            $girlsHead = $girlsHead[$childAgeYears][$childAgeMonths][3];
        }


        //echo $viewResult;
        if ($childGender == 1){

            return [
                'childMiddleHeight' =>   $boysHeight,
                'childMiddleWeight' => $boysWeight,
                'childMiddleHead' => $boysHead,
                'viewResult' => $viewResult,
            ];

        } elseif ($childGender == 2) {

            return [
                'childMiddleHeight' =>   $girlsHeight,
                'childMiddleWeight' => $girlsWeight,
                'childMiddleHead' => $girlsHead,
                'viewResult' => $viewResult,
            ];


        }



    }

    /*
     * Калькулятор расчета роста будущего ребенка в зависимости от роста родителей
     */

    public function childHeightFutureCalculation($childGender,$motherHeight,$fatherHeight){

        $viewResult = 1;

        if (!$childGender){
            $childGender = 1;
            $motherHeight = 155;
            $fatherHeight = 165;
            $viewResult = 0;
        }

        if ($childGender == 1 ) {

            $childHeightFolk = ($motherHeight + $fatherHeight) * 0.54 - 4.5;
            $childHeightHawker = ($motherHeight + $fatherHeight) / 2 + 6.4;
            $childHeightKarkus = (($motherHeight * 1.08) + $fatherHeight) / 2;
            $childHeightSmirnovFrom = ($motherHeight + $fatherHeight + 12.5) / 2 - 8;
            $childHeightSmirnovTo = ($motherHeight + $fatherHeight + 12.5) / 2 + 8;

        }else{

            $childHeightFolk = ($motherHeight + $fatherHeight) * 0.51 - 7.5;
            $childHeightHawker = ($motherHeight + $fatherHeight) / 2 - 6.4;
            $childHeightKarkus = ($motherHeight + ($fatherHeight * 0.923)) / 2;
            $childHeightSmirnovFrom = ($motherHeight + $fatherHeight + 12.5) / 2 - 8;
            $childHeightSmirnovTo = ($motherHeight + $fatherHeight + 12.5) / 2 + 8;

        }


        return [
            'childHeightFolk' =>   round($childHeightFolk),
            'childHeightHawker' => round($childHeightHawker),
            'childHeightKarkus' => round($childHeightKarkus),
            'childHeightSmirnovFrom' => round($childHeightSmirnovFrom),
            'childHeightSmirnovTo' => round($childHeightSmirnovTo),
            'viewResult' => $viewResult,
        ];

    }

    /*
     * Калькулятор расчета цвета глаз будущего ребенка по цвету глаз родителей
     */

    public function childEyesColorCalculation($motherEyesColor,$fatherEyesColor){

        $viewResult = 1;

        if (!$motherEyesColor){
            $motherEyesColor = 1;
            $fatherEyesColor = 1;
            $viewResult = 0;
            $childEyesColor = 0;
        }
            $eyesColor[1]='brown';
            $eyesColor[2]='green';
            $eyesColor[3]='blue';

            $motherEyesColor = $eyesColor[$motherEyesColor];
            $fatherEyesColor = $eyesColor[$fatherEyesColor];


         $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
         $childEyesColor = $womanCalculatorsDataArrays->childEyesColor($motherEyesColor,$fatherEyesColor);


        if ($childEyesColor<>0) {
            return [
                'childEyesColorBrown' => $childEyesColor['childEyesColorBrown'],
                'childEyesColorGreen' => $childEyesColor['childEyesColorGreen'],
                'childEyesColorBlue' => $childEyesColor['childEyesColorBlue'],
                'viewResult' => $viewResult,
            ];
        } else {

            return [
                'childEyesColorBrown' => $childEyesColor['childEyesColorBrown'],
                'childEyesColorGreen' => $childEyesColor['childEyesColorGreen'],
                'childEyesColorBlue' => $childEyesColor['childEyesColorBlue'],
                'viewResult' => $viewResult,
            ];


        }
    }


    /*
     * Сегодняшняя дата
     */

    public function todayDate($pregnancyCalculationDate){

        if ($pregnancyCalculationDate<>0){

            return $pregnancyCalculationDate;

        }else {
            $date = new \DateTime();
            return $date->format('d-m-Y');
        }
    }



    public function dueDateByPregnancyWeekCalculation($pregnancyWeek){

        $viewResult = 1;

        if (!$pregnancyWeek){
            $pregnancyWeek = 0;
            $viewResult = 0;
        }

        $weeksLeft = 40 - $pregnancyWeek;
        $daysLeft = $weeksLeft * 7;

        $todayDate = new \DateTime();
        $dueDate = $todayDate->add(new \DateInterval('P' . $daysLeft . 'D'));

        return [

            'dueDate' => Yii::$app->formatter->asDate($dueDate->format('Y-m-d'), 'long'),
            'viewResult' => $viewResult,

        ];


    }


    public function conceptionDateByDueDateCalculation($dueDate){

        $viewResult = 1;

        if (!$dueDate){
            $dueDate = 0;
            $viewResult = 0;
        }


        //$now = time();
        $dueDate = new \DateTime($dueDate);


        $conceptionDate = $dueDate->sub(new \DateInterval('P266D'));


        return [

            'conceptionDate' => Yii::$app->formatter->asDate($conceptionDate->format('Y-m-d'), 'long'),
            'viewResult' => $viewResult,

        ];


    }


    public function embedIframeSize($url){

        if ($url) {
            $embedIframeSize = new WomanCalculatorsEmbedDataArrays();
            $embedIframeSize = $embedIframeSize->embedIframeSize($url);
        } else {
            $embedIframeSize = 0;
        }


        return $embedIframeSize;

    }



}

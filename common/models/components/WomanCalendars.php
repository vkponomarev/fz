<?php

namespace common\models\components;

use common\models\Pages;
use Faker\Provider\tr_TR\DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\components\WomanCalculatorsDataArrays;





class WomanCalendars extends Pages
{


    public function calendarView(){

        $monthCount = 0;
        $dayCount =0;
        $ovulationRatio = 0;
        $ovulationRatio10 = 10;
        $ovulationRatio20 = 20;
        $ovulationRatio50 = 50;
        $ovulationRatio60 = 60;
        $ovulationRatio80 = 80;
        $ovulationRatio100 = 100;
        $cycleStart = 1;
        $menstruation = 1;
        $safeSex = 1;

        $todayDate = new \DateTime();
        $firstDayOfMonth = new \DateTime('2019-09-01');
        echo $todayDate->format('Y-m-D') . '<br>';
        echo $firstDayOfMonth->format('Y-m-d') . '<br>';
        echo Yii::$app->formatter->asDate( $firstDayOfMonth, 'php:D') . '<br>';

        // Узнаем количество дней в месяце
        $number = cal_days_in_month(CAL_GREGORIAN, $todayDate->format('m'), $todayDate->format('Y')); // 31
        echo "Всего {$number} дней в {$todayDate->format('m')} {$todayDate->format('Y')} года" . '<br>';
       // Количетсво дней в текущем месяце $days = date("t");
       //'php:D' Означает использовать PHP date()-format Здесь мы выводим название текущего дня недели:
        echo Yii::$app->formatter->asDate( $todayDate, 'php:D') . '<br>';




        echo Yii::$app->formatter->asDate($todayDate->format('d'),'long') . '<br>';
     /*   $pregnancyBeginDate = new \DateTime($pregnancyCalculationDateInverse);
        $differenceBetweenTodayAndChosenDay = $pregnancyBeginDate->diff($todayDate);
        $differenceBetweenTodayAndChosenDay = $differenceBetweenTodayAndChosenDay->format("%a");
        Yii::$app->formatter->asDate($dueDate->format('Y-m-d'),'long'),*/
        ////Начало календаря
        echo '<div class="calendar-year">';

//Начало одно месяца
        echo '<div class="calendar" data-toggle="calendar">
                 <div class="row row-padding">
                 <div class="col-xs-12 calendar-month-name">
                      <span class="calendar-month-name-span">Январь</span>
                  </div>
              </div>';

//Названия дней недели
        echo '<div class="row row-padding">
    
                <div class="col-xs-12 calendar-day-name">
                     <span class="calendar-day-name-span"> ПН </span>
                </div>
        
        
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> ПН </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> ВТ </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> СР </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> ЧТ </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> ПТ</span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> СБ</span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">  ВС</span>
        </div>
    </div>';


        echo '<div class="row row-padding">';

        echo ' <div class="col-xs-12 calendar-day-new1 calendar-no-current-month">
            <time datetime="2014-06-29">29</time>
        </div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';

    }

    public function thisMonthCalendarView(){

        $monthCount = 0;
        $dayCount =0;
        $ovulationRatio = 0;
        $ovulationRatio10 = 10;
        $ovulationRatio20 = 20;
        $ovulationRatio50 = 50;
        $ovulationRatio60 = 60;
        $ovulationRatio80 = 80;
        $ovulationRatio100 = 100;
        $cycleStart = 1;
        $menstruation = 1;
        $safeSex = 1;
        $nameOfDaysInWeek = WomanCalendars::nameOfDaysInWeek();
        $date = new \DateTime('first day of');
        $thisMonthName = $date->format('M');
        //echo  $thisMonthName;
        $calendar = array();
        do {
            $calendar[$date->format('W')][$date->format('N')] = $date->format('j');

            // echo ' $date->format(\'j\') ' . $date->format('j') . '  <br><br>';

            $date->modify('+1 day');
        } while ($date->format('j') !== '1');


     echo '<div class="calendar-year">';

//Начало одно месяца
        echo '<div class="calendar" data-toggle="calendar">
                 <div class="row row-padding">
                 <div class="col-xs-12 calendar-month-name">
                      <span class="calendar-month-name-span">
                      ' .
                      Yii::$app->formatter->asDate( $thisMonthName, 'php:M')
                      . '
                      </span>
                  </div>
              </div>';

//Названия дней недели
        echo '<div class="row row-padding">
        
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
            $nameOfDaysInWeek[1]
            . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">
        ' .
        $nameOfDaysInWeek[2]
            . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
            $nameOfDaysInWeek[3]
            . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">
        ' .
        $nameOfDaysInWeek[4]
            . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
            $nameOfDaysInWeek[5]
            . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">
        ' .
        $nameOfDaysInWeek[6]
            . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
            $nameOfDaysInWeek[7]
            . '
            </span>
        </div>
    </div>';

//Начало отображения дней


        foreach ($calendar as $week) {

            echo '<div class="row row-padding">';
            for ($i = 1; $i <= 7; $i++) {

                  echo ' <div class="col-xs-12 calendar-day-new1">
                <span class="calendar-day-span">';
                   echo $week[$i] ?? "";
                   echo '</span>
                 </div>';

            }

            echo '</div>';
        }


        echo '</div>';
        echo '</div>';

    }

    public function thisYearCalendarView()
    {

        $monthCount = 0;
        $dayCount = 0;
        $ovulationRatio = 0;
        $ovulationRatio10 = 10;
        $ovulationRatio20 = 20;
        $ovulationRatio50 = 50;
        $ovulationRatio60 = 60;
        $ovulationRatio80 = 80;
        $ovulationRatio100 = 100;
        $cycleStart = 1;
        $menstruation = 1;
        $safeSex = 1;

        $nameOfDaysInWeek = WomanCalendars::nameOfDaysInWeek();
        $nameOfMonthsInYear = WomanCalendars::nameOfMonthsInYear();
        $startDateOfThisYear = new \DateTime('first day of January');
        $daysInYear = date('L') ? 366 : 365;
        $countDays = 0;
        $date = new \DateTime('first day of');
        $thisMonthName = $date->format('M');
        //echo  $thisMonthName;
        //echo $startDateOfThisYear->format('y:M:d');
        //echo $daysInYear;
        $calendar = array();
        do {
            $calendar[$startDateOfThisYear->format('n')][$startDateOfThisYear->format('W')][$startDateOfThisYear->format('N')] = $startDateOfThisYear->format('j');
            //$calendar[$date->format('W')][$date->format('N')] = $date->format('j');

           // echo ' $startDateOfThisYear->format(\'n\') ' . $startDateOfThisYear->format('n') . '  <br><br>';
           // echo ' $date->format(\'j\') ' . $startDateOfThisYear->format('j') . '  <br><br>';
           // echo ' $date->format(\'W\') ' . $startDateOfThisYear->format('W') . '  <br><br>';
          //  echo ' $date->format(\'N\') ' . $startDateOfThisYear->format('N') . '  <br><br>';
            $countDays++;
            $startDateOfThisYear->modify('+1 day');
        } while ($countDays !== $daysInYear);

        //echo $countDays;
        echo '<div class="calendar-year">';

//Начало одно месяца
        $countMonths = 0;
        foreach ($calendar as $months) {
            $countMonths++;
            //echo  $countMonths;
            echo '<div class="calendar" data-toggle="calendar">
                 <div class="row row-padding">
                 <div class="col-xs-12 calendar-month-name">
                      <span class="calendar-month-name-span">
                      ';
                echo $nameOfMonthsInYear[$countMonths];

               // Yii::$app->formatter->asDate('2019.11.10', 'php:M')
            echo '
                      </span>
                  </div>
              </div>';

//Названия дней недели
            echo '<div class="row row-padding">
        
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
                $nameOfDaysInWeek[1]
                . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">
        ' .
                $nameOfDaysInWeek[2]
                . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
                $nameOfDaysInWeek[3]
                . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">
        ' .
                $nameOfDaysInWeek[4]
                . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
                $nameOfDaysInWeek[5]
                . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span">
        ' .
                $nameOfDaysInWeek[6]
                . '
            </span>
        </div>
        <div class="col-xs-12 calendar-day-name">
            <span class="calendar-day-name-span"> 
            ' .
                $nameOfDaysInWeek[7]
                . '
            </span>
        </div>
    </div>';

//Начало отображения дней


            foreach ($months as $week) {

                echo '<div class="row row-padding">';
                for ($i = 1; $i <= 7; $i++) {

                    echo ' <div class="col-xs-12 calendar-day-new1">
                <span class="calendar-day-span">';
                    echo $week[$i] ?? "";
                    echo '</span>
                 </div>';

                }

                echo '</div>';
            }


            echo '</div>';



        } echo '</div>';
    }

    public function ovulationCalendar(
        $ovulationCalculationMenstrualLength,
        $ovulationCalculationCycleLength,
        $ovulationCalculationDate
    )
    {
        if (!isset($ovulationCalculationMenstrualLength))
            $ovulationCalculationMenstrualLength=5;
        if (!isset($ovulationCalculationCycleLength))
            $ovulationCalculationCycleLength=28;

        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца

        // Менструальный период 25 каждые 25 дней
        // В самом начале идет менструация 5 дней
        // потом идет пару дней перерыв
        // потом идет овуляция 7 дней
        // Потом перерыв до следующей менструации.

        // Настройки для полного года
        /* $calendar = array();
        $startOfCalendar = new \DateTime('first day of January');
        $eachDay = $startOfCalendar;
        $daysInYear = date('L') ? 366 : 365;*/

        // Настройки для 6 месяцев от выбранной даты.
        $startOfCalendar = new \DateTime($ovulationCalculationDate);
        $startOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));


        //echo $startOfCalendar->format('Y m d');
        $eachDay = new \DateTime($startOfCalendar->format('Y-m-01'));
        //echo $eachDay->format('Y m d');

        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar->modify('+5 month');
        $endOfCalendar = new \DateTime($endOfCalendar->format('Y-m-t'));
        //echo $endOfCalendar->format('Y m d');

        $daysInYear = date('L') ? 366 : 365;
        $countDays = 0;
        do {

            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                    [
                        'dayInMonth' => $eachDay->format('j'),
                        'menstruationDay' => 0,
                        'ovulationDay' => 0,
                    ];

            $countDays++;
            $eachDay->modify('+1 day');

        } while ($eachDay->format('Y m d') <= $endOfCalendar->format('Y m d'));

        // Начало формирования менструального периода.
        $menstruationStart = new \DateTime($ovulationCalculationDate);
        $menstruationPeriod = $ovulationCalculationCycleLength;
        //echo 'Период менструации ' . $menstruationPeriod . '<br>';
        $ovulationDays = 7; // Сколько длиться овуляция
        $ovulationStart = $menstruationPeriod-17; // С какого дня меструального периода начинается овуляция
        //echo 'Старт овуляции ' . $ovulationStart;
        $countMenstruationPeriodDays = 0;
        $countOvulationDays=0;
        $countMenstruationDays = 0;
        $menstruationPeriodStarted = 0;
        $countDays = 0;

        // Настройки для 6 месяцев от выбранной даты.
        $eachDay = new \DateTime($startOfCalendar->format('Y-m-01'));
        //echo $eachDay->format('Y m d');
        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar->modify('+5 month');
        $endOfCalendar = new \DateTime($endOfCalendar->format('Y-m-t'));
        //echo $endOfCalendar->format('Y m d');

        do {

            if ($menstruationStart->format('d m Y') == $eachDay->format('d m Y')){
                $menstruationPeriodStarted =1;
                //echo 'Нашел день начала периода';
            }

            // Если день начала периода наступил то начинаем
            // Заполнять календарь
            if ($menstruationPeriodStarted==1) {
                $countMenstruationPeriodDays++;

                // Если мы находимся в меструационном периоде
                if ($countMenstruationPeriodDays < $menstruationPeriod) {

                    // Если сейчас идет менструация
                    // То записываем в календарь что это день менструации
                    if (($countMenstruationPeriodDays>=$ovulationStart)&&($countOvulationDays<$ovulationDays)){

                        $countOvulationDays++;
                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' =>
                                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                ,
                                'ovulationDay' => 1,
                            ];
                        if ($countOvulationDays==4) {
                            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                                [
                                    'dayInMonth' => $eachDay->format('j'),
                                    'menstruationDay' =>
                                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                    ,
                                    'ovulationDay' => 2,
                                ];
                        }

                        // Если овуляция закончилась то проверяем наступил ли новый менструационный период чтобы запустить новую овуляцию
                    } else {
                        if (($countMenstruationPeriodDays+1)==($menstruationPeriod)){

                            $countOvulationDays = 0;
                        }
                    }

                    if ($countMenstruationDays < $ovulationCalculationMenstrualLength) {



                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' => 1,
                                'ovulationDay' =>
                                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['ovulationDay']
                                ,
                            ];
                        $countMenstruationDays++;
                    } else {
                        if (($countMenstruationPeriodDays+1)==($menstruationPeriod)){

                            $countMenstruationDays = 0;
                        }
                    }
                    // Если сейчас идет овуляция то записываем в календарь что это день овуляции


                // Если очередной период менструации завершился то
                // Нужно его начать сначала
                } else {
                    //echo 'Менструационный период закончился';
                    $countMenstruationPeriodDays=0;

                }
            }

            $countDays++;
            $eachDay->modify('+1 day');

        } while ($eachDay->format('Y m d') <= $endOfCalendar->format('Y m d'));
        //echo '<pre>' . print_r($calendar) . '</pre>';

        return $calendar;
    }

    public function conceptionCalendar(
        $ovulationCalculationMenstrualLength,
        $ovulationCalculationCycleLength,
        $ovulationCalculationDate
    )
    {
        if (!isset($ovulationCalculationMenstrualLength))
            $ovulationCalculationMenstrualLength=5;
        if (!isset($ovulationCalculationCycleLength))
            $ovulationCalculationCycleLength=28;
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца

        // Менструальный период 25 каждые 25 дней
        // В самом начале идет менструация 5 дней
        // потом идет пару дней перерыв
        // потом идет овуляция 7 дней
        // Потом перерыв до следующей менструации.

        // Настройки для полного года
        /* $calendar = array();
        $startOfCalendar = new \DateTime('first day of January');
        $eachDay = $startOfCalendar;
        $daysInYear = date('L') ? 366 : 365;*/

        // Настройки для 6 месяцев от выбранной даты.
        $startOfCalendar = new \DateTime($ovulationCalculationDate);
        $startOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));

        //echo $startOfCalendar->format('Y m d');
        $eachDay = new \DateTime($startOfCalendar->format('Y-m-01'));
        //echo $eachDay->format('Y m d');

        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar->modify('+5 month');
        $endOfCalendar = new \DateTime($endOfCalendar->format('Y-m-t'));
        //echo $endOfCalendar->format('Y m d');

        $daysInYear = date('L') ? 366 : 365;
        $countDays = 0;
        do {

            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                [
                    'dayInMonth' => $eachDay->format('j'),
                    'menstruationDay' => 0,
                    'ovulationDay' => 0,
                    'conceptionNegativeDay' => 0,
                ];

            $countDays++;
            $eachDay->modify('+1 day');

        } while ($eachDay->format('Y m d') <= $endOfCalendar->format('Y m d'));

        // Начало формирования менструального периода.
        $menstruationStart = new \DateTime($ovulationCalculationDate);
        $menstruationPeriod = $ovulationCalculationCycleLength;
        //echo 'Период менструации ' . $menstruationPeriod . '<br>';
        $ovulationDays = 7; // Сколько длиться овуляция
        $ovulationStart = $menstruationPeriod-17; // С какого дня меструального периода начинается овуляция
        $ovulationEnd = $ovulationStart + 6;
        //echo 'Старт овуляции ' . $ovulationStart;

        $countMenstruationPeriodDays = 0;
        $countOvulationDays=0;
        $countMenstruationDays = 0;
        $menstruationPeriodStarted = 0;
        $countDays = 0;

        // Настройки для 6 месяцев от выбранной даты.
        $eachDay = new \DateTime($startOfCalendar->format('Y-m-01'));
        //echo $eachDay->format('Y m d');
        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar->modify('+5 month');
        $endOfCalendar = new \DateTime($endOfCalendar->format('Y-m-t'));
        //echo $endOfCalendar->format('Y m d');

        do {

            if ($menstruationStart->format('d m Y') == $eachDay->format('d m Y')){
                $menstruationPeriodStarted =1;
                //echo 'Нашел день начала периода';
            }

            // Если день начала периода наступил то начинаем
            // Заполнять календарь
            if ($menstruationPeriodStarted==1) {
                $countMenstruationPeriodDays++;

                // Если мы находимся в меструационном периоде
                if ($countMenstruationPeriodDays <= $menstruationPeriod) {


                    //Если менструация кончилась а овуляция еще не началась
                    // То мы заполняем неблагоприятные дни для зачатия
                    if (($countMenstruationPeriodDays>$ovulationCalculationMenstrualLength)&&($countMenstruationPeriodDays<$ovulationStart)){

                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                ,
                                'ovulationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['ovulationDay']
                                ,
                                'conceptionNegativeDay' => 1,
                            ];

                    }elseif ($countMenstruationPeriodDays>$ovulationEnd){
                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                ,
                                'ovulationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['ovulationDay']
                                ,
                                'conceptionNegativeDay' => 2,
                            ];

                    }


                    // Если сейчас идет овуляция
                    // То записываем в календарь что это день овуляции
                    if (($countMenstruationPeriodDays>=$ovulationStart)&&($countOvulationDays<$ovulationDays)) {

                        $countOvulationDays++;
                        if ($countOvulationDays < 4) {

                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                ,
                                'ovulationDay' => 1,
                                'conceptionNegativeDay' => $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['conceptionNegativeDay']
                                ,
                            ];
                        } elseif ($countOvulationDays > 4){
                            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                                [
                                    'dayInMonth' => $eachDay->format('j'),
                                    'menstruationDay' =>
                                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                    ,
                                    'ovulationDay' => 3,
                                    'conceptionNegativeDay' => $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['conceptionNegativeDay']
                                    ,
                                ];


                        }
                        if ($countOvulationDays==4) {
                            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                                [
                                    'dayInMonth' => $eachDay->format('j'),
                                    'menstruationDay' =>
                                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['menstruationDay']
                                    ,
                                    'ovulationDay' => 2,
                                    'conceptionNegativeDay' => $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['conceptionNegativeDay']
                                    ,
                                ];
                        }

                        // Если овуляция закончилась то проверяем наступил ли новый менструационный период чтобы запустить новую овуляцию
                    } else {
                        if (($countMenstruationPeriodDays)==($menstruationPeriod)){

                            $countOvulationDays = 0;
                        }
                    }


                    //Здесь мы записываем день менструации
                    if ($countMenstruationDays < $ovulationCalculationMenstrualLength) {

                      $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' => 1,
                                'ovulationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['ovulationDay']
                                ,
                                'conceptionNegativeDay' => $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['conceptionNegativeDay']
                                ,
                            ];
                        $countMenstruationDays++;
                    } else {
                        if (($countMenstruationPeriodDays)==($menstruationPeriod)){

                            $countMenstruationDays = 0;
                        }
                    }
                    // Если сейчас идет овуляция то записываем в календарь что это день овуляции


                    // Если очередной период менструации завершился то
                    // Нужно его начать сначала
                } else {
                    //echo 'Менструационный период закончился';
                    //echo $eachDay->format('Y m d');
                    if ($ovulationCalculationMenstrualLength<>0) {
                        $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                            [
                                'dayInMonth' => $eachDay->format('j'),
                                'menstruationDay' => 1,
                                'ovulationDay' =>
                                    $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['ovulationDay']
                                ,
                                'conceptionNegativeDay' => $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')]['conceptionNegativeDay']
                                ,
                            ];
                    }
                    $countMenstruationDays++;
                    $countMenstruationPeriodDays=1;

                }
            }

            $countDays++;
            $eachDay->modify('+1 day');

        } while ($eachDay->format('Y m d') <= $endOfCalendar->format('Y m d'));
        //echo '<pre>' . print_r($calendar) . '</pre>';

        return $calendar;
    }


    public function pregnancyCalendar(
        $pregnancyCalculationMethod,
        $pregnancyCalculationDate
    )
    {

        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // Настройки для 6 месяцев от выбранной даты.

        $startOfCalendar = new \DateTime($pregnancyCalculationDate);
        //echo  'Начало календаря ' . $startOfCalendar->format('Y-m-d') . '<br>';
        //$startOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $todayDate = new \DateTime();
        $dueDate = new \DateTime($pregnancyCalculationDate);
        //echo  'сегодняшняя дата ' . $todayDate->format('Y-m-d') . '<br>';

        //echo $startMonth . '<br>';
        $startWeek = $startOfCalendar->format('W');
        //echo $startOfCalendar->format('Y m d');
        //echo $eachDay->format('Y m d');

        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));

        //echo $endOfCalendar->format('Y m d');

        $startOfPregnancy = new \DateTime($pregnancyCalculationDate);

        //echo  'Начало отсчета ' . $startOfPregnancy->format('Y-m-d') . '<br>';

        $endOfPregnancy = new \DateTime($pregnancyCalculationDate);
        $endOfPregnancy->modify('+42 week');

        if ($pregnancyCalculationMethod==2) {
            $startOfPregnancy->modify('-14 day');
            $endOfPregnancy->modify('-14 day');
            $startOfCalendar->modify('-14 day');
            //$endOfCalendar->modify('-13 day');
            $dueDate->modify('-14 day');
        }
        $startOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $startMonth = $startOfCalendar->format('n');

        //echo  'Начало беременности ' . $startOfPregnancy->format('Y-m-d') . '<br>';
        //echo  'начало календаря ' . $startOfCalendar->format('Y-m-d') . '<br>';

        //echo  'начальный месяц беременности' . $startOfPregnancy->format('n') . '<br>';
        //echo  'начальный месяц календаря' . $startOfCalendar->format('n') . '<br>';
        /*if ($startOfPregnancy->format('n') <> $startOfCalendar->format('n')){

            $refineStartMonth=1;

        } else{

            $refineStartMonth=0;

        }*/


        $monthOfPregnancy1 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy2 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy3 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy4 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy5 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy6 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy7 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy8 = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $monthOfPregnancy9 = new \DateTime($startOfPregnancy->format('Y-m-d'));

        $monthOfPregnancy1->modify('+28 day');
        $monthOfPregnancy2->modify('+62 day');
        $monthOfPregnancy3->modify('+93 day');
        $monthOfPregnancy4->modify('+124 day');
        $monthOfPregnancy5->modify('+155 day');
        $monthOfPregnancy6->modify('+185 day');
        $monthOfPregnancy7->modify('+216 day');
        $monthOfPregnancy8->modify('+249 day');
        $monthOfPregnancy9->modify('+280 day');


        $endOfCalendar->modify('+44 week');
        $dueDate->modify('+280 day');
        $endOfCalendar = new \DateTime($endOfCalendar->format('Y-m-t'));
        $eachDay = new \DateTime($startOfCalendar->format('Y-m-01'));
        $countDays = 0;

        $daysInMonths = WomanCalendars::daysInMonths($pregnancyCalculationDate);

        do {

            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                [
                    'dayInMonth' => $eachDay->format('j'),
                    'trimesterTwo' => 0,
                    'trimesterThree' => 0,
                    'pregnancyWeek' => 0,
                    'pregnancyMonth' => 0,
                    'todayDate' => 0,
                    'thisWeek' => $eachDay->format('W'),
                    'thisMonth' => $eachDay->format('n'),
                    'dueDate' => 0,
                    'monthOfPregnancy1' => 0,
                    'monthOfPregnancy2' => 0,
                    'monthOfPregnancy3' => 0,
                    'monthOfPregnancy4' => 0,
                    'monthOfPregnancy5' => 0,
                    'monthOfPregnancy6' => 0,
                    'monthOfPregnancy7' => 0,
                    'monthOfPregnancy8' => 0,
                    'monthOfPregnancy9' => 0,
                ];

            /*echo 'номер месяца \'n\'  ' . $eachDay->format('n') . '<br>';
            echo 'номер недели \'W\' ' . $eachDay->format('W') . '<br>';
            echo 'номер дня    \'N\' ' . $eachDay->format('N') . '<br>';*/

            $countDays++;
            $eachDay->modify('+1 day');

        } while ($eachDay->format('Y m d') <= $endOfCalendar->format('Y m d'));

        // Начало формирования календаря беременности.
        $countDays = 0;
        $countDaysForOneWeek=0;
        $countTodayDate = 0;
        $pregnancyWeek = 1;
        $pregnancyMonth = 1;

        $eachDay = new \DateTime($startOfCalendar->format('Y-m-01'));

        $startOfPregnancyTrimesterTwo = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $startOfPregnancyTrimesterTwo->modify('+84 day');


        $startOfPregnancyTrimesterThree = new \DateTime($startOfPregnancy->format('Y-m-d'));
        $startOfPregnancyTrimesterThree->modify('+196 day');
        //echo $startOfPregnancyTrimesterThree->format('Y-m-d');
        //echo $eachDay->format('Y m d');
        //echo $endOfCalendar->format('Y m d');
        $pregnancyTrimesterTwo = 0;
        $pregnancyTrimesterThree = 0;
        $pregnancyStarted = 0;
        $pregnancyEnded = 0;
        $findDueDate = 0;
        $findMonthOfPregnancy1 = 0;
        do {


            // Находим даты 1 месяца беременности
            if ($monthOfPregnancy1->format('Y-m-d') > $eachDay->format('Y-m-d')){
                $findMonthOfPregnancy1 = 1;
                //echo $eachDay->format('d m Y') . '<br>';
            } else   $findMonthOfPregnancy1 = 0;

            // Находим даты 2 месяца беременности
            if ($monthOfPregnancy2->format('Y-m-d') > $eachDay->format('Y-m-d')
            && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy2 = 1;

            } else   $findMonthOfPregnancy2 = 0;

            // Находим даты 3 месяца беременности
            if ($monthOfPregnancy3->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy3 = 1;

            } else   $findMonthOfPregnancy3 = 0;

            // Находим даты 4 месяца беременности
            if ($monthOfPregnancy4->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy3==0)
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy4 = 1;

            } else   $findMonthOfPregnancy4 = 0;

            // Находим даты 5 месяца беременности
            if ($monthOfPregnancy5->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy4==0)
                && ($findMonthOfPregnancy3==0)
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy5 = 1;

            } else   $findMonthOfPregnancy5 = 0;

            // Находим даты 6 месяца беременности
            if ($monthOfPregnancy6->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy5==0)
                && ($findMonthOfPregnancy4==0)
                && ($findMonthOfPregnancy3==0)
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy6 = 1;

            } else   $findMonthOfPregnancy6 = 0;

            // Находим даты 7 месяца беременности
            if ($monthOfPregnancy7->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy6==0)
                && ($findMonthOfPregnancy5==0)
                && ($findMonthOfPregnancy4==0)
                && ($findMonthOfPregnancy3==0)
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy7 = 1;

            } else   $findMonthOfPregnancy7 = 0;

            // Находим даты 8 месяца беременности
            if ($monthOfPregnancy8->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy7==0)
                && ($findMonthOfPregnancy6==0)
                && ($findMonthOfPregnancy5==0)
                && ($findMonthOfPregnancy4==0)
                && ($findMonthOfPregnancy3==0)
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy8 = 1;

            } else   $findMonthOfPregnancy8 = 0;

            // Находим даты 9 месяца беременности
            if ($monthOfPregnancy9->format('Y-m-d') > $eachDay->format('Y-m-d')
                && ($findMonthOfPregnancy8==0)
                && ($findMonthOfPregnancy7==0)
                && ($findMonthOfPregnancy6==0)
                && ($findMonthOfPregnancy5==0)
                && ($findMonthOfPregnancy4==0)
                && ($findMonthOfPregnancy3==0)
                && ($findMonthOfPregnancy2==0)
                && ($findMonthOfPregnancy1==0)
            ){
                $findMonthOfPregnancy9 = 1;

            } else   $findMonthOfPregnancy9 = 0;

           // Находим дату предолагаемой беременности
            if ($dueDate->format('Y-m-d') == $eachDay->format('Y-m-d')){
                $findDueDate = 1;

            } else  $findDueDate = 0;


            // Находим дату Начала третьего триместра
            if ($startOfPregnancyTrimesterThree->format('Y-m-d') == $eachDay->format('Y-m-d')){
                $pregnancyTrimesterThree = 1;

            } else  $pregnancyTrimesterThree = 0;


            // Находим дату Начала второго триместра
            if ($startOfPregnancyTrimesterTwo->format('Y-m-d') == $eachDay->format('Y-m-d')){
                $pregnancyTrimesterTwo = 1;
                //echo 'Нашли триместр два ' . $eachDay->format('d m Y');
            } else  $pregnancyTrimesterTwo = 0;


            // Находим дату начала беременности
            if ($startOfPregnancy->format('Y-m-d') == $eachDay->format('Y-m-d')){
                $pregnancyStarted =1;
                // echo 'Нашел день начала периода <br>';
                //echo 'Начало беременности ' . $startOfPregnancy->format('Y-m-d') . '<br>';
            }
            // Находим дату окончания беременности
            if ($endOfPregnancy->format('Y-m-d') == $eachDay->format('Y-m-d')){
                $pregnancyEnded =1;
                //echo 'Нашел день начала периода';
            }

            // Находим Сегодняшнюю дату
            if ($todayDate->format('Y-m-d') == $eachDay->format('Y-m-d')){
                $countTodayDate = 1;
                //echo 'Нашел день начала периода';
            } else $countTodayDate = 0;

            if (($pregnancyStarted==1)&&($pregnancyEnded<>1))
                {
                //echo 'Текущий день ' . $eachDay->format('d m Y') . '<br>';
                //Начинаем отсчитываение недели
                $countDaysForOneWeek++;

                //Записываем в календарь текущую неделю
                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] =
                    [
                        'dayInMonth' => $eachDay->format('j'),
                        'trimesterTwo' => $pregnancyTrimesterTwo,
                        'trimesterThree' => $pregnancyTrimesterThree,
                        'pregnancyWeek' => $pregnancyWeek,
                        'pregnancyMonth' => $pregnancyMonth,
                        'todayDate' => $countTodayDate,
                        'thisWeek' => $eachDay->format('W'),
                        'thisMonth' => $eachDay->format('n'),
                        'dueDate' => $findDueDate,
                        'monthOfPregnancy1' => $findMonthOfPregnancy1,
                        'monthOfPregnancy2' => $findMonthOfPregnancy2,
                        'monthOfPregnancy3' => $findMonthOfPregnancy3,
                        'monthOfPregnancy4' => $findMonthOfPregnancy4,
                        'monthOfPregnancy5' => $findMonthOfPregnancy5,
                        'monthOfPregnancy6' => $findMonthOfPregnancy6,
                        'monthOfPregnancy7' => $findMonthOfPregnancy7,
                        'monthOfPregnancy8' => $findMonthOfPregnancy8,
                        'monthOfPregnancy9' => $findMonthOfPregnancy9,
                    ];

                //Если неделя завершена то сбрасываем отсчет
                if ($countDaysForOneWeek==7){
                    //Добавляем одну неделю к беременности
                    $pregnancyWeek++;
                    //Сбрасываем счетчик дней недели так как сейчас седьмой день недели
                    $countDaysForOneWeek=0;
                }

            }

            $countDays++;
            $eachDay->modify('+1 day');




        } while ($eachDay->format('Y-m-d') <= $endOfCalendar->format('Y-m-d'));
        //echo '<pre>' . print_r($calendar) . '</pre>';
        return [
            'calendar' => $calendar,
            'daysInMonths' => $daysInMonths,
            'startMonth' => $startMonth,
            'startWeek' => $startWeek,
            'calculationDate' => $startOfCalendar->format('Y-m-01')
        ];
    }


    public function conceptionChineseCalendar(
        $chineseCalendarCalculationMothersAge=18,
        $calendarCalculationDate
    )
    {
        if (!isset($chineseCalendarCalculationMothersAge))
            $chineseCalendarCalculationMothersAge=18;
        if (!isset($calendarCalculationDate))
            $calendarCalculationDate=new \DateTime();
        // g-girl
        // b-boy

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $chineseCalendarMonth = $womanCalculatorsDataArrays->chineseCalendarMonth($chineseCalendarCalculationMothersAge);


        $startOfCalendar = new \DateTime($calendarCalculationDate);
        $startOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar->modify('+12 month');
        $eachMonth = new \DateTime($startOfCalendar->format('Y-m-01'));

        do {
           //echo $eachMonth->format('n');
            $calendar[$eachMonth->format('n')]=$chineseCalendarMonth[$eachMonth->format('n')];
            $eachMonth->modify('+1 month');

        } while ($eachMonth->format('Y-m-d') <= $endOfCalendar->format('Y-m-d'));
        

        return $calendar;
    }


    public function conceptionJapanCalendar(
        $japanCalendarCalculationMotherMonthBirth,
        $japanCalendarCalculationFatherMonthBirth,
        $calendarCalculationDate
    )
    {

        if (!$japanCalendarCalculationMotherMonthBirth){
        $japanCalendarCalculationMotherMonthBirth=6;
        $japanCalendarCalculationFatherMonthBirth=6;

        }

        // g-girl
        // b-boy
        // Ниже массив скрыт так как большой

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $fatherMonthBirthAndMotherMonthBirthResult = $womanCalculatorsDataArrays->fatherMonthBirthAndMotherMonthBirthResult();

        $fatherMonthBirthAndMotherMonthBirthResultNumber =
            $fatherMonthBirthAndMotherMonthBirthResult[$japanCalendarCalculationFatherMonthBirth][$japanCalendarCalculationMotherMonthBirth];

        $womanCalculatorsDataArrays = new WomanCalculatorsDataArrays();
        $japanCalendarMonthAndResultNumber = $womanCalculatorsDataArrays->japanCalendarMonthAndResultNumber();

        $startOfCalendar = new \DateTime($calendarCalculationDate);
        $startOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar = new \DateTime($startOfCalendar->format('Y-m-01'));
        $endOfCalendar->modify('+12 month');
        $eachMonth = new \DateTime($startOfCalendar->format('Y-m-01'));

        do {
           //echo $eachMonth->format('n');
           $calendar[$eachMonth->format('n')]=$japanCalendarMonthAndResultNumber[$eachMonth->format('n')][$fatherMonthBirthAndMotherMonthBirthResultNumber];
           $eachMonth->modify('+1 month');

        } while ($eachMonth->format('Y-m-d') <= $endOfCalendar->format('Y-m-d'));


       return $calendar;
    }



   /*
     * Записываем в массив $nameOfDaysInWeek сокращенное название дней недели в зависимости от текущего языка
     * php:D - Сокращенное название для недели.
     * Yii::$app->formatter->asDate переводит дату в нужный формат с текущим языком.
     *
     * $firstDayOfWeek = new DateTime($firstDayOfWeek); Переводи узнанную дату в формат DateTime
     *
     * $firstDayOfWeek->modify ('+1 day'); Прибавляем один день к этой дате.
     *
     */
    public function nameOfDaysInWeek()
    {
        $firstDayOfWeek = new \DateTime('Last Monday');
        $countNameOfDaysInWeek = 1;
        $nameOfDaysInWeek = array();

        //$prevMonthDays = array_fill(1, 7,  Yii::$app->formatter->asDate($firstDayOfWeek->modify ('+1 day'), 'php:D'));
        do {

            $nameOfDaysInWeek[$countNameOfDaysInWeek] = Yii::$app->formatter->asDate($firstDayOfWeek, 'php:D');
            $firstDayOfWeek->modify('+1 day');
            //echo $nameOfDaysInWeek[$countNameOfDaysInWeek] . '<br>';
            $countNameOfDaysInWeek++;

        } while ($countNameOfDaysInWeek !== 8);

       return $nameOfDaysInWeek;
    }

    /*
     * 'php:M' - Сокращенное название месяца
     * использовал это так как не нашел полное название месяца в единственном числе.
     * LLLL - Полное название месяца в единственном числе.
     */

    public function nameOfMonthsInYear($calculationDate)
    {


        $firstMonth = new \DateTime($calculationDate);
        $firstMonth = new \DateTime($firstMonth->format('Y-m-15'));
        $firstMonth->modify('-1 month');
        $countNameOfMonths = 0;
        $nameOfMonths = array();

      do {

            $nameOfMonths[$countNameOfMonths] = Yii::$app->formatter->asDate($firstMonth, 'LLLL Y');
            $firstMonth->modify('+1 month');
            //echo $nameOfDaysInWeek[$countNameOfDaysInWeek] . '<br>';
            $countNameOfMonths++;

        } while ($countNameOfMonths !== 13);

        return $nameOfMonths;
    }

    public function daysInMonths($calculationDate){

        $firstMonth = new \DateTime($calculationDate);
        $firstMonth = new \DateTime($firstMonth->format('Y-m-01'));
        //echo $firstMonth->format('Y-m-d');
        $firstMonth->modify('-1 month');
        $countMonths = 0;
        $daysInMonths = array();
        do {

            $daysInMonths[$countMonths] = $firstMonth->format('t');
            //echo $firstMonth->format('Y-m-d') . '  ' . $firstMonth->format('t') . '<br>';
            $firstMonth->modify('+1 month');
            //echo $nameOfDaysInWeek[$countNameOfDaysInWeek] . '<br>';
            $countMonths++;

        } while ($countMonths !== 13);

        return $daysInMonths;
    }


}

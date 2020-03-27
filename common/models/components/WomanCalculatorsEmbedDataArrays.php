<?php

namespace common\models\components;

class WomanCalculatorsEmbedDataArrays {


    public function embedIframeSize($url){


        //Калькуляторы беременности
        $embedSize['pregnancy-calculator']['large'] = [800,400];
        $embedSize['pregnancy-calculator']['middle'] = [600,460];
        $embedSize['pregnancy-calculator']['small'] = [280,540];

        $embedSize['pregnancy-calculator-by-date-of-conception']['large'] = [800,400];
        $embedSize['pregnancy-calculator-by-date-of-conception']['middle'] = [600,410];
        $embedSize['pregnancy-calculator-by-date-of-conception']['small'] = [280,490];

        $embedSize['conception-date-calculator-by-due-date']['large'] = [800,400];
        $embedSize['conception-date-calculator-by-due-date']['middle'] = [600,400];
        $embedSize['conception-date-calculator-by-due-date']['small'] = [280,400];

        $embedSize['pregnancy-calculator-by-the-first-fetal-movements']['large'] = [800,380];
        $embedSize['pregnancy-calculator-by-the-first-fetal-movements']['middle'] = [600,460];
        $embedSize['pregnancy-calculator-by-the-first-fetal-movements']['small'] = [280,580];

        $embedSize['gestational-age-calculator']['large'] = [800,420];
        $embedSize['gestational-age-calculator']['middle'] = [600,410];
        $embedSize['gestational-age-calculator']['small'] = [280,490];

        $embedSize['pregnancy-calculator-by-menstrual-period']['large'] = [800,420];
        $embedSize['pregnancy-calculator-by-menstrual-period']['middle'] = [600,410];
        $embedSize['pregnancy-calculator-by-menstrual-period']['small'] = [280,510];

        $embedSize['pregnancy-calculator-by-months']['large'] = [1000,1950];
        $embedSize['pregnancy-calculator-by-months']['middle'] = [620,2800];
        $embedSize['pregnancy-calculator-by-months']['small'] = [305,4820];

        $embedSize['pregnancy-calculator-by-ultrasound-scan']['large'] = [800,380];
        $embedSize['pregnancy-calculator-by-ultrasound-scan']['middle'] = [600,380];
        $embedSize['pregnancy-calculator-by-ultrasound-scan']['small'] = [280,450];

        $embedSize['pregnancy-calculator-by-weeks']['large'] = [1000,1950];
        $embedSize['pregnancy-calculator-by-weeks']['middle'] = [620,2800];
        $embedSize['pregnancy-calculator-by-weeks']['small'] = [305,4820];

        $embedSize['pregnancy-weight-gain-calculator']['large'] = [800,680];
        $embedSize['pregnancy-weight-gain-calculator']['middle'] = [600,670];
        $embedSize['pregnancy-weight-gain-calculator']['small'] = [280,670];

        //Калькуляторы календарей
        $embedSize['baby-gender-calendar']['large'] = [1000,1100];
        $embedSize['baby-gender-calendar']['middle'] = [620,1650];
        $embedSize['baby-gender-calendar']['small'] = [305,2880];

        $embedSize['conception-calendar']['large'] = [1000,1050];
        $embedSize['conception-calendar']['middle'] = [620,1570];
        $embedSize['conception-calendar']['small'] = [305,2800];

        $embedSize['boy-conception-calendar']['large'] = [1000,1070];
        $embedSize['boy-conception-calendar']['middle'] = [620,1600];
        $embedSize['boy-conception-calendar']['small'] = [305,2860];

        $embedSize['girl-conception-calendar']['large'] = [1000,1120];
        $embedSize['girl-conception-calendar']['middle'] = [620,1630];
        $embedSize['girl-conception-calendar']['small'] = [305,2860];

        $embedSize['chinese-conception-calendar']['large'] = [1000,1070];
        $embedSize['chinese-conception-calendar']['middle'] = [620,1600];
        $embedSize['chinese-conception-calendar']['small'] = [305,2860];

        $embedSize['japanese-conception-calendar']['large'] = [1000,1140];
        $embedSize['japanese-conception-calendar']['middle'] = [620,1640];
        $embedSize['japanese-conception-calendar']['small'] = [305,2920];

        $embedSize['fertile-days-calendar']['large'] = [1000,1050];
        $embedSize['fertile-days-calendar']['middle'] = [620,1550];
        $embedSize['fertile-days-calendar']['small'] = [305,2780];

        $embedSize['menstrual-period-calendar']['large'] = [1000,1050];
        $embedSize['menstrual-period-calendar']['middle'] = [620,1550];
        $embedSize['menstrual-period-calendar']['small'] = [305,2780];

        $embedSize['ovulation-calendar']['large'] = [1000,1050];
        $embedSize['ovulation-calendar']['middle'] = [620,1550];
        $embedSize['ovulation-calendar']['small'] = [305,2750];

        $embedSize['pregnancy-calendar']['large'] = [1000,1950];
        $embedSize['pregnancy-calendar']['middle'] = [620,2800];
        $embedSize['pregnancy-calendar']['small'] = [305,4820];

        $embedSize['safe-days-calendar']['large'] = [1000,1050];
        $embedSize['safe-days-calendar']['middle'] = [620,1550];
        $embedSize['safe-days-calendar']['small'] = [305,2820];

        // Калькуляторы для ребенка

        $embedSize['baby-eye-color-calculator']['large'] = [800,480];
        $embedSize['baby-eye-color-calculator']['middle'] = [600,470];
        $embedSize['baby-eye-color-calculator']['small'] = [280,470];

        $embedSize['child-gender-by-blood-renewal']['large'] = [800,530];
        $embedSize['child-gender-by-blood-renewal']['middle'] = [600,620];
        $embedSize['child-gender-by-blood-renewal']['small'] = [280,740];

        $embedSize['child-gender-by-blood-type']['large'] = [800,430];
        $embedSize['child-gender-by-blood-type']['middle'] = [600,420];
        $embedSize['child-gender-by-blood-type']['small'] = [280,440];

        $embedSize['child-gender-by-chinese-calendar']['large'] = [1000,1070];
        $embedSize['child-gender-by-chinese-calendar']['middle'] = [620,1600];
        $embedSize['child-gender-by-chinese-calendar']['small'] = [305,2860];

        $embedSize['child-gender-by-conception-date']['large'] = [1000,1120];
        $embedSize['child-gender-by-conception-date']['middle'] = [620,1630];
        $embedSize['child-gender-by-conception-date']['small'] = [305,2890];

        $embedSize['child-gender-by-japanese-calendar']['large'] = [1000,1170];
        $embedSize['child-gender-by-japanese-calendar']['middle'] = [620,1680];
        $embedSize['child-gender-by-japanese-calendar']['small'] = [305,2930];

        $embedSize['child-gender-by-last-menstruation']['large'] = [1000,1120];
        $embedSize['child-gender-by-last-menstruation']['middle'] = [620,1630];
        $embedSize['child-gender-by-last-menstruation']['small'] = [305,2890];

        $embedSize['child-gender-by-ovulation']['large'] = [1000,1120];
        $embedSize['child-gender-by-ovulation']['middle'] = [620,1630];
        $embedSize['child-gender-by-ovulation']['small'] = [305,2890];

        $embedSize['child-gender-by-parents-age']['large'] = [800,530];
        $embedSize['child-gender-by-parents-age']['middle'] = [600,620];
        $embedSize['child-gender-by-parents-age']['small'] = [280,740];

        $embedSize['child-gender-by-rh-factor']['large'] = [800,430];
        $embedSize['child-gender-by-rh-factor']['middle'] = [600,420];
        $embedSize['child-gender-by-rh-factor']['small'] = [280,440];

        $embedSize['child-future-height-calculator']['large'] = [800,570];
        $embedSize['child-future-height-calculator']['middle'] = [600,570];
        $embedSize['child-future-height-calculator']['small'] = [280,580];

        $embedSize['baby-weight-and-height-calculator']['large'] = [800,550];
        $embedSize['baby-weight-and-height-calculator']['middle'] = [600,550];
        $embedSize['baby-weight-and-height-calculator']['small'] = [280,590];

        // Калькуляторы даты родов
        $embedSize['due-date-by-conception-date']['large'] = [800,400];
        $embedSize['due-date-by-conception-date']['middle'] = [600,410];
        $embedSize['due-date-by-conception-date']['small'] = [280,490];

        $embedSize['due-date-by-menstruation']['large'] = [800,440];
        $embedSize['due-date-by-menstruation']['middle'] = [600,410];
        $embedSize['due-date-by-menstruation']['small'] = [280,490];

        $embedSize['due-date-by-pregnancy-week']['large'] = [800,410];
        $embedSize['due-date-by-pregnancy-week']['middle'] = [600,400];
        $embedSize['due-date-by-pregnancy-week']['small'] = [280,480];


        return $embedSize[$url];

    }

    public function embedCalculatorsAvailable($url){


        //Калькуляторы беременности
        $embedSize['pregnancy-calculator']['large'] = [800,400];
        $embedSize['pregnancy-calculator-by-date-of-conception']['large'] = [800,400];
        $embedSize['conception-date-calculator-by-due-date']['small'] = [280,400];
        $embedSize['pregnancy-calculator-by-the-first-fetal-movements']['small'] = [280,580];
        $embedSize['gestational-age-calculator']['small'] = [280,490];
        $embedSize['pregnancy-calculator-by-menstrual-period']['small'] = [280,510];
        $embedSize['pregnancy-calculator-by-months']['small'] = [305,4820];
        $embedSize['pregnancy-calculator-by-ultrasound-scan']['middle'] = [600,380];
        $embedSize['pregnancy-calculator-by-ultrasound-scan']['small'] = [280,450];

        $embedSize['pregnancy-calculator-by-weeks']['large'] = [1000,1950];
        $embedSize['pregnancy-calculator-by-weeks']['middle'] = [620,2800];
        $embedSize['pregnancy-calculator-by-weeks']['small'] = [305,4820];

        $embedSize['pregnancy-weight-gain-calculator']['large'] = [800,680];
        $embedSize['pregnancy-weight-gain-calculator']['middle'] = [600,670];
        $embedSize['pregnancy-weight-gain-calculator']['small'] = [280,670];

        //Калькуляторы календарей
        $embedSize['baby-gender-calendar']['large'] = [1000,1100];
        $embedSize['baby-gender-calendar']['middle'] = [620,1650];
        $embedSize['baby-gender-calendar']['small'] = [305,2880];

        $embedSize['conception-calendar']['large'] = [1000,1050];
        $embedSize['conception-calendar']['middle'] = [620,1570];
        $embedSize['conception-calendar']['small'] = [305,2800];

        $embedSize['boy-conception-calendar']['large'] = [1000,1070];
        $embedSize['boy-conception-calendar']['middle'] = [620,1600];
        $embedSize['boy-conception-calendar']['small'] = [305,2860];

        $embedSize['girl-conception-calendar']['large'] = [1000,1120];
        $embedSize['girl-conception-calendar']['middle'] = [620,1630];
        $embedSize['girl-conception-calendar']['small'] = [305,2860];

        $embedSize['chinese-conception-calendar']['large'] = [1000,1070];
        $embedSize['chinese-conception-calendar']['middle'] = [620,1600];
        $embedSize['chinese-conception-calendar']['small'] = [305,2860];

        $embedSize['japanese-conception-calendar']['large'] = [1000,1140];
        $embedSize['japanese-conception-calendar']['middle'] = [620,1640];
        $embedSize['japanese-conception-calendar']['small'] = [305,2920];

        $embedSize['fertile-days-calendar']['large'] = [1000,1050];
        $embedSize['fertile-days-calendar']['middle'] = [620,1550];
        $embedSize['fertile-days-calendar']['small'] = [305,2780];

        $embedSize['menstrual-period-calendar']['large'] = [1000,1050];
        $embedSize['menstrual-period-calendar']['middle'] = [620,1550];
        $embedSize['menstrual-period-calendar']['small'] = [305,2780];

        $embedSize['ovulation-calendar']['large'] = [1000,1050];
        $embedSize['ovulation-calendar']['middle'] = [620,1550];
        $embedSize['ovulation-calendar']['small'] = [305,2750];

        $embedSize['pregnancy-calendar']['large'] = [1000,1950];
        $embedSize['pregnancy-calendar']['middle'] = [620,2800];
        $embedSize['pregnancy-calendar']['small'] = [305,4820];

        $embedSize['safe-days-calendar']['large'] = [1000,1050];
        $embedSize['safe-days-calendar']['middle'] = [620,1550];
        $embedSize['safe-days-calendar']['small'] = [305,2820];

        // Калькуляторы для ребенка

        $embedSize['baby-eye-color-calculator']['large'] = [800,480];
        $embedSize['baby-eye-color-calculator']['middle'] = [600,470];
        $embedSize['baby-eye-color-calculator']['small'] = [280,470];

        $embedSize['child-gender-by-blood-renewal']['large'] = [800,530];
        $embedSize['child-gender-by-blood-renewal']['middle'] = [600,620];
        $embedSize['child-gender-by-blood-renewal']['small'] = [280,740];

        $embedSize['child-gender-by-blood-type']['large'] = [800,430];
        $embedSize['child-gender-by-blood-type']['middle'] = [600,420];
        $embedSize['child-gender-by-blood-type']['small'] = [280,440];

        $embedSize['child-gender-by-chinese-calendar']['large'] = [1000,1070];
        $embedSize['child-gender-by-chinese-calendar']['middle'] = [620,1600];
        $embedSize['child-gender-by-chinese-calendar']['small'] = [305,2860];

        $embedSize['child-gender-by-conception-date']['large'] = [1000,1120];
        $embedSize['child-gender-by-conception-date']['middle'] = [620,1630];
        $embedSize['child-gender-by-conception-date']['small'] = [305,2890];

        $embedSize['child-gender-by-japanese-calendar']['large'] = [1000,1170];
        $embedSize['child-gender-by-japanese-calendar']['middle'] = [620,1680];
        $embedSize['child-gender-by-japanese-calendar']['small'] = [305,2930];

        $embedSize['child-gender-by-last-menstruation']['large'] = [1000,1120];
        $embedSize['child-gender-by-last-menstruation']['middle'] = [620,1630];
        $embedSize['child-gender-by-last-menstruation']['small'] = [305,2890];

        $embedSize['child-gender-by-ovulation']['large'] = [1000,1120];
        $embedSize['child-gender-by-ovulation']['middle'] = [620,1630];
        $embedSize['child-gender-by-ovulation']['small'] = [305,2890];

        $embedSize['child-gender-by-parents-age']['large'] = [800,530];
        $embedSize['child-gender-by-parents-age']['middle'] = [600,620];
        $embedSize['child-gender-by-parents-age']['small'] = [280,740];

        $embedSize['child-gender-by-rh-factor']['large'] = [800,430];
        $embedSize['child-gender-by-rh-factor']['middle'] = [600,420];
        $embedSize['child-gender-by-rh-factor']['small'] = [280,440];

        $embedSize['child-future-height-calculator']['large'] = [800,570];
        $embedSize['child-future-height-calculator']['middle'] = [600,570];
        $embedSize['child-future-height-calculator']['small'] = [280,580];

        $embedSize['baby-weight-and-height-calculator']['large'] = [800,550];
        $embedSize['baby-weight-and-height-calculator']['middle'] = [600,550];
        $embedSize['baby-weight-and-height-calculator']['small'] = [280,590];

        // Калькуляторы даты родов
        $embedSize['due-date-by-conception-date']['large'] = [800,400];
        $embedSize['due-date-by-conception-date']['middle'] = [600,410];
        $embedSize['due-date-by-conception-date']['small'] = [280,490];

        $embedSize['due-date-by-menstruation']['large'] = [800,440];
        $embedSize['due-date-by-menstruation']['middle'] = [600,410];
        $embedSize['due-date-by-menstruation']['small'] = [280,490];

        $embedSize['due-date-by-pregnancy-week']['large'] = [800,410];
        $embedSize['due-date-by-pregnancy-week']['middle'] = [600,400];
        $embedSize['due-date-by-pregnancy-week']['small'] = [280,480];


        return $embedSize[$url];

    }

}
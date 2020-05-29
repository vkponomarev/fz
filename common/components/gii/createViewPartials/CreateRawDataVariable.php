<?php

namespace common\components\gii\createViewPartials;


class CreateRawDataVariable
{


    function __construct()
    {

    }


    function variable($data, $name)
    {

        $rawDataBody = '';
        $rawDataStart = '\'' . $name . '\' => [
        ';
        $rawDataEnd = '
        ],
        ';
        $variable = $rawDataStart;
        //(new \common\components\dump\Dump())->printR($data);


        foreach ($data as $key => $value) {

            if (is_array($value)) {

                $rawDataInsideStart = '\'' . $key . '\' => [
            ';

                $rawDataInsideEnd = '
            ],
            ';

                $variable = $variable . $rawDataInsideStart;

                foreach ($value as $key2 => $value2) {

                    if (!is_array($value2)) {
                        $value2 = str_replace("'", "\'", $value2);
                        $rawDataBody = '\'' . $key2 . '\' => \'' . $value2 . '\',
                ';

                        $variable = $variable . $rawDataBody;

                    } else {
                        //Если внутри массив а не переменная.
                        $rawDataInsideStart2 = '\'' . $key . '\' => [
                        ';

                        $rawDataInsideEnd2 = '
                         ],
                        ';

                        $variable = $variable . $rawDataInsideStart2;

                        foreach ($value2 as $key3 => $value3) {

                            $value3 = str_replace("'", "\'", $value3);
                            $rawDataBody = '\'' . $key3 . '\' => \'' . $value3 . '\',
                            ';

                            $variable = $variable . $rawDataBody;

                        }

                        $variable = $variable . $rawDataInsideEnd;

                    }

                }

                $variable = $variable . $rawDataInsideEnd;
            } else {
                //Не массив то записываем
                $value = str_replace("'", "\'", $value);

                $variable = $variable . '\'' . $key . '\' => \'' . $value . '\',
                ';

            }
        }


        $variable = $variable . $rawDataEnd;

        return $variable;


    }
    /*
'aliases' => [
'@bower' => '@vendor/bower-asset',
    //'@bower' => '@vendor/yidas/yii2-bower-asset/bower',
'@npm'   => '@vendor/npm-asset',

],
*/
}

<?php


?><?=$this->render('./_first-letter-index_en.min.php');?><?php if (Yii::$app->language == 'ru'):?><br><?=$this->render('./_first-letter-index_ru.min.php');?><?php endif;?>
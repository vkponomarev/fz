<?php

namespace common\components\translation;

class TranslationByLanguage
{

    public function translation($translationsBySong, $languageID)
    {
        //(new \common\components\dump\Dump())->printR($translationsBySong);
        $key = array_search($languageID, array_column($translationsBySong, 'languages_id'));
        //(new \common\components\dump\Dump())->printR($key);
        if (!($key === false)) {

            $translation = $translationsBySong[$key];

        } else {

            $translation = false;

        }

        return $translation;

    }

}


<?php

namespace common\components\tools;



class UrlTransliteration
{

    function urlTransliteration($url){

        $UrlTransliterated = preg_replace("/-/"," ",$url);
        $UrlTransliterated = transliterator_transliterate("Any-Latin; Latin-ASCII; [\\u0100-\\u7fff] remove ; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $UrlTransliterated);
        $UrlTransliterated = preg_replace('/[^\\pL\\d._]+/u', '-', $UrlTransliterated);
        //echo $UrlTransliterated . "<br>";

        return $UrlTransliterated;

    }




  /*  <br><br>
    <?php
    var_dump(transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', "Αλφαβητικός Κατάλογο"));
    // string(41) "a ae ubermensch pa hoyeste niva! i a lublu php! fi"
    ?>
    <br><br>
    <?php
    var_dump(transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', "ΑλφƏdalətός Κατάλογο"));
    // string(41) "a ae ubermensch pa hoyeste niva! i a lublu php! fi"
    ?>
    <br><br>
    <?php
    function slugify($string) {
        $string = transliterator_transliterate("Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $string);
        $string = preg_replace('/[-\s]+/', '-', $string);
        return trim($string, '-');
    }

    echo slugify("Ədalət Nəsibov Édouard-Léon Scott De Martinville");
    ?>
<br><br>
    <?php
    $str = 'àáâãäçèéêëìíî^HHfd!! 3 7jjj **ïñòóôõöùúûüýÿ
ÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖ3234ÙÚÛÜÝ Ədalət';
    $rule = 'NFD; [:Nonspacing Mark:] Remove; NFC';

    $myTrans = Transliterator::create($rule);
    echo $myTrans->transliterate($str);

    //aaaaaceeeeiiiinooooouuuuyy
    //AAAAACEEEEIIIINOOOOOUUUUY
    ?>
    <br><br>
<?php
// needs intl extension
$string= "Ədalət Nəsibov Édouard-Léon Scott De Martinvilleœ', 'æ', 'đ', 'ø', 'ł', 'ß', 'Œ', 'Æ', 'Đ', 'Ø', 'Ł";
if (function_exists('transliterator_transliterate')) {
    $string = transliterator_transliterate("Any-Latin; Latin-ASCII; [\\u0100-\\u7fff] remove", $string);
    echo $string . "<br>";
    $string = preg_replace('/[^\\pL\\d._]+/u', '-', $string);
    echo $string . "<br>";
    $string = preg_replace('/[-\\s]+/', '-', $string);
    echo $string . "<br>";
} else {

    // uses iconv
    $string = preg_replace('~[^\\pL0-9_\\.]+~u', '-', $string);
    echo $string . "<br>";
    // substitutes anything but letters, numbers and '-' with separator
    $string = trim($string, '-');
    echo $string . "<br>";
    if (function_exists('iconv')) {
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        // TRANSLIT does the whole job
    }
    echo $string . "<br>";
    $string = preg_replace('~[^-a-zA-Z0-9_\\.]+~', '', $string);
    // keep only letters, numbers, '_' and separator
}
$string = trim($string, '-');
echo $string . "<br>";

?>*/






}

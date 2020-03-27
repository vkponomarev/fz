<?php

namespace common\models;

use Faker\Provider\tr_TR\DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

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




class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'active'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['url'],'unique'],
            [['menu_active'], 'integer'],
            [['main_page_active'], 'integer'],
            [['sort'], 'integer'],
            [['embed'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent_id',
            'url' => 'Url',
            'name' => 'Name',
            'active' => 'Active',
            'menu_active' => 'Menu active',
            'main_page_active' => 'Main active',
            'sort' => 'Sort',
            'embed' => 'Embed',
        ];
    }


    public function pageText($pageId){

        $pageText = Pages::find()->Where(['id'=>$pageId])->one();

        $texts = $pageText->getTexts()
            ->asArray()
            ->where(['languages_id'=>1])
            ->one();

        echo '<pre>';
        //var_dump($texts);
        print_r($texts);
        echo '</pre>';
        //return

    }


    public function getTexts()
    {
        return $this->hasMany(PagesText::className(), ['pages_id' => 'id']);
    }










    public static function getStatusList() {
        return ['off','on'];
    }

    public function getStatusName() {
        $list = self::getStatusList();
        return $list[$this->active];
    }

    public function getStatusNameMenu() {
        $list = self::getStatusList();
        return $list[$this->menu_active];
    }
    public function getStatusNameMainPage() {
        $list = self::getStatusList();
        return $list[$this->main_page_active];
    }


    public function getOnPagesText(){
        return $this->hasMany(PagesText::className(),['pages_id'=>'id']);
    }

    public function getPagesText(){
        return $this->hasMany(PagesText::className(),['pages_id'=>'id']);
    }

    public function getLanguages(){
        return $this->hasMany(Languages::className(),['id'=>'languages_id'])->via('pagesText');
    }
    // ИД текстов конкретной страницы для которой есть переводы
    public function getPagesTextAll(){
        return $this->hasMany(PagesText::className(),['id'=>'pages_id'])->via('pagesText');
    }


    public function getPagesTextId(){
        return $this->hasMany(PagesText::className(),['pages_id'=>'id']);
    }

    public function getAllPages()
    {

        return $customer = Pages::find()
            ->all();

    }

    /*
     *
     *
     */

    public function alternate($url, $languages, $currentLanguages){

        $alternate = array();
        $alternateCount = 0;
        $relativeHomeUrl = \yii\helpers\Url::home(true);

        if ($url) {

            foreach ($languages as $one) {

                if ($one->url <> $currentLanguages->url) {

                    $alternateCount++;

                    $alternate[$alternateCount]['url'] = $relativeHomeUrl . $one->url . '/' . $url . '/';
                    $alternate[$alternateCount]['language'] = $one->url;

                }

            }

        } else {

            foreach ($languages as $one) {

                if ($one->url <> $currentLanguages->url) {

                    $alternateCount++;

                    $alternate[$alternateCount]['url'] = $relativeHomeUrl . $one->url . '/';
                    $alternate[$alternateCount]['language'] = $one->url;

                }

            }
        }
        return $alternate;

    }

    public function canonical($url, $currentLanguages){

        $relativeHomeUrl = \yii\helpers\Url::home(true);

        if ($url){

            $canonical = $relativeHomeUrl . $currentLanguages->url . '/' . $url . '/';


        } else {

            $canonical = $relativeHomeUrl . $currentLanguages->url . '/';

        }


        return $canonical;

    }


    public function embedUrl($url, $currentLanguages){

        $relativeHomeUrl = \yii\helpers\Url::home(true);

        $embedUrl = $relativeHomeUrl . $currentLanguages->url . '/' . $url . '/?embed=1';

        return $embedUrl;

    }



    public function currentLanguages()
    {
        $languages = Languages::find()->andWhere(['url' => Yii::$app->language])->one();

        return $languages;

    }


    public function currentPageId($url){

        $page = Pages::find()->andWhere(['url' => $url])->one();

        return $page->id;
    }


    public function breadcrumbs($allPages,$allPagesTranslations,$url){

        $breadcrumbs = array();
        foreach ($allPages as $one) {

            if ($one->url == $url){

                $key = array_search($one->id, array_column($allPagesTranslations, 'pages_id'));

                if ($one->parent_id==0){

                    //$breadcrumbs[1][0] = 0; если ссылка
                    //$breadcrumbs[1][1] = 1; если существует
                    //$breadcrumbs[1][2] Название крошки
                    //$breadcrumbs[1][3] Ссылка
                    $breadcrumbs[1][0] = 0;
                    $breadcrumbs[1][1] = 1;
                    $breadcrumbs[1][2] = $allPagesTranslations[$key]['menu_name'];
                    $breadcrumbs[1][3] = $one->url;

                    $breadcrumbs[2][0] = 0;
                    $breadcrumbs[2][1] = 0;
                    $breadcrumbs[2][2] = 0;
                    $breadcrumbs[2][3] = 0;

                } elseif ($one->parent_id<>0){

                    $key1 = array_search($one->parent_id, array_column($allPagesTranslations, 'pages_id'));
                    $key2 = array_search($one->parent_id, array_column($allPages, 'id'));
                    $breadcrumbs[1][0] = 1;
                    $breadcrumbs[1][1] = 1;
                    $breadcrumbs[1][2] = $allPagesTranslations[$key1]['menu_name'];
                    $breadcrumbs[1][3] = $allPages[$key2]['url'];

                    $breadcrumbs[2][0] = 0;
                    $breadcrumbs[2][1] = 1;
                    $breadcrumbs[2][2] = $allPagesTranslations[$key]['menu_name'];
                    $breadcrumbs[2][3] = $one->url;
                    //echo $breadcrumbs[1][2];

                }

            }

        }

        return $breadcrumbs;

    }


    public function mainPageCategories($allPages,$allPagesTranslations)

    {

        // Нам нужна пара Menu_Name И УРЛ
        // $languages = Languages::find()->andWhere(['url' => Yii::$app->language])->one();
        // $mainPages = Pages::find()->andWhere(['parent_id' => '0'])->andWhere(['menu_active' => '1'])->all();
        // $parentPages = Pages::find()->andWhere(['!=' , 'parent_id' , '0'])->andWhere(['menu_active' => '1'])->all();
        //$allPages;
        // $allPages = Pages::find()->andWhere(['menu_active' => 1])->all();
        //$allPagesTranslations = PagesText::find()->andWhere(['languages_id' => $languagesId])->asArray()->all();

        // echo print_r( $parentPages);


        $mainPageItemsCount = 0;
        $mainPageItemsParentCount = 0;
        $mainPageItems = array();
        $mainPageItemsParent = array();
        $key = 0;
        //$key = array_search(4,array_column($allPagesTranslations,'pages_id'));

        //echo $key . '<br><br>';
        //echo $allPagesTranslations[$key]['text2'] . '<br><br>';


        foreach ($allPages as $one) {

            if ($one->main_page_active) {
                if ($one->parent_id == 0) {

                    $key = array_search($one->id, array_column($allPagesTranslations, 'pages_id'));


                    //echo $key . '<br><br>';

                    //echo $allPagesTranslations[$key]['menu_name'] . '<br><br>';

                    $mainPageItems[$mainPageItemsCount]['menu_name'] = $allPagesTranslations[$key]['menu_name'];
                    $mainPageItems[$mainPageItemsCount]['index_name'] = $allPagesTranslations[$key]['index_name'];
                    $mainPageItems[$mainPageItemsCount]['title'] = $allPagesTranslations[$key]['title'];
                    $mainPageItems[$mainPageItemsCount]['plates_title'] = $allPagesTranslations[$key]['plates_title'];
                    $mainPageItems[$mainPageItemsCount]['h1'] = $allPagesTranslations[$key]['h1'];
                    $mainPageItems[$mainPageItemsCount]['text1'] = $allPagesTranslations[$key]['text1'];
                    $mainPageItems[$mainPageItemsCount]['short_description'] = $allPagesTranslations[$key]['short_description'];
                    $mainPageItems[$mainPageItemsCount]['text2'] = $allPagesTranslations[$key]['text2'];
                    $mainPageItems[$mainPageItemsCount]['parent_id'] = $mainPageItemsCount;
                    $mainPageItems[$mainPageItemsCount]['url'] = $one->url;
                    $mainPageItems[$mainPageItemsCount]['id'] = $one->id;
                    $mainPageItemsCount++;


                    foreach ($allPages as $two) {

                        if (($two->parent_id <> 0) && ($two->parent_id == $one->id)) {


                            $keyParent = array_search($two->id, array_column($allPagesTranslations, 'pages_id'));


                            //echo $keyParent . '<br><br>';

                            //echo $allPagesTranslations[$keyParent]['text2'] . '<br><br>';


                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['menu_name'] = $allPagesTranslations[$keyParent]['menu_name'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['title'] = $allPagesTranslations[$keyParent]['title'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['plates_title'] = $allPagesTranslations[$keyParent]['plates_title'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['short_description'] = $allPagesTranslations[$keyParent]['short_description'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['h1'] = $allPagesTranslations[$keyParent]['h1'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['text1'] = $allPagesTranslations[$keyParent]['text1'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['text2'] = $allPagesTranslations[$keyParent]['text2'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['url'] = $two->url;
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['id'] = $two->id;
                            $mainPageItemsParentCount++;
                        }


                    }


                }
            }
        }
        return ['mainPageItems' => $mainPageItems, 'mainPageItemsParent' => $mainPageItemsParent];


    }


    public function parentPageCategories($allPages,$allPagesTranslations,$url)

    {

        $mainPageItemsCount = 0;
        $mainPageItemsParentCount = 0;
        $mainPageItems = array();
        $mainPageItemsParent = array();
        //echo $url . '<br><br>';

        foreach ($allPages as $one) {
            if ($one->main_page_active){
                if ($one->url == $url) {
                    //echo $one->id . '<br><br>';
                    $key = array_search($one->id, array_column($allPagesTranslations, 'pages_id'));

                    //echo $key . '<br><br>';

                    //echo $allPagesTranslations[$key]['menu_name'] . '<br><br>';

                    $mainPageItems[$mainPageItemsCount]['menu_name'] = $allPagesTranslations[$key]['menu_name'];
                    $mainPageItems[$mainPageItemsCount]['title'] = $allPagesTranslations[$key]['title'];
                    $mainPageItems[$mainPageItemsCount]['plates_title'] = $allPagesTranslations[$key]['plates_title'];
                    $mainPageItems[$mainPageItemsCount]['short_description'] = $allPagesTranslations[$key]['short_description'];
                    $mainPageItems[$mainPageItemsCount]['h1'] = $allPagesTranslations[$key]['h1'];
                    $mainPageItems[$mainPageItemsCount]['text1'] = $allPagesTranslations[$key]['text1'];
                    $mainPageItems[$mainPageItemsCount]['text2'] = $allPagesTranslations[$key]['text2'];
                    $mainPageItems[$mainPageItemsCount]['parent_id'] = $mainPageItemsCount;
                    $mainPageItems[$mainPageItemsCount]['url'] = $one->url;
                    $mainPageItems[$mainPageItemsCount]['id'] = $one->id;

                    $mainPageItemsCount++;


                    foreach ($allPages as $two) {

                        if (($two->parent_id <> 0) && ($two->parent_id == $one->id)) {

                            $keyParent = array_search($two->id, array_column($allPagesTranslations, 'pages_id'));

                            //echo $keyParent . '<br><br>';

                            //echo $allPagesTranslations[$keyParent]['text2'] . '<br><br>';

                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['menu_name'] = $allPagesTranslations[$keyParent]['menu_name'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['title'] = $allPagesTranslations[$keyParent]['title'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['plates_title'] = $allPagesTranslations[$keyParent]['plates_title'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['short_description'] = $allPagesTranslations[$keyParent]['short_description'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['h1'] = $allPagesTranslations[$keyParent]['h1'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['text1'] = $allPagesTranslations[$keyParent]['text1'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['text2'] = $allPagesTranslations[$keyParent]['text2'];
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['url'] = $two->url;
                            $mainPageItemsParent[$mainPageItemsCount - 1][$mainPageItemsParentCount]['id'] = $two->id;

                            $mainPageItemsParentCount++;
                        }


                    }

                }
            }
        }
        return ['mainPageItems' => $mainPageItems, 'mainPageItemsParent' => $mainPageItemsParent];


    }




    /*
     * public function languagesSwitcher()
     *
     * Здесь мы выводим виджет переключения языков.
     *
     *
     */


    public function languagesSwitcher()
    {

        $languages = Languages::find()->andWhere(['active' => 1])->all();
        return $languages;

    }



    public function allPages()
    {

        $allPages = Pages::find()->andWhere(['active'=>1])->orderBy('sort')->all();

        return $allPages;

    }

    public function allPagesTranslations($languagesId)
    {

        $allPagesTranslations = PagesText::find()->andWhere(['languages_id' => $languagesId])->asArray()->all();

        return $allPagesTranslations;

    }


    /*
     *
     * public function menuItems()
     * Здесь мы создаем меню основываясь на таблице pages с parent_id
     * menu_active - Выводить или нет эту строку в меню
     * parent_id - Указывает на id родителя
     * /var/sites/calc.com/vendor/yiisoft/yii2-bootstrap/src/Nav.php
     * Отредактировал строку 193 закомментировал место которое мешало
     * Слелать из верхнего меню дробдаун ссылку а не просто открывание дроп
     * дауна по нажатию.
     *
     *
     * */


    public function menuItems($allPages,$allPagesTranslations)
    {

        // Нам нужна пара Menu_Name И УРЛ
        //$languages = Languages::find()->andWhere(['url' => Yii::$app->language])->one();

        //$allPages = Pages::find()->andWhere(['menu_active'=>1])->all();
        //$allPagesTranslations = PagesText::find()->andWhere(['languages_id' => $languagesId])->asArray()->all();
        //$allPagesTranslations = ArrayHelper::map(PagesText::find()->andWhere(['languages_id' => $languagesId])->all(),'id','pages_id');
        //$mainPages = Pages::find()->andWhere(['parent_id' => '0'])->andWhere(['menu_active' => '1'])->all();
        //$parentPages = Pages::find()->andWhere(['!=' , 'parent_id' , '0'])->andWhere(['menu_active' => '1'])->all();

        // echo print_r( $parentPages);

        // echo print_r($allPages) . '<br><br>';
        //echo '<pre>' . print_r($allPagesTranslations) . '</pre><br><br>';
        //echo $allPagesTranslations['2']['text2'] . '<br><br>';
        $menuItemsCount = 0;
        $menuItemsParentCount = 0;
        $menuItems = array();
        $menuItemsParent = array();
        $key = 0;
        //$key = array_search(4,array_column($allPagesTranslations,'pages_id'));

        //echo $key . '<br><br>';
        //echo $allPagesTranslations[$key]['text2'] . '<br><br>';


        foreach ($allPages as $one) {

            if ($one->menu_active) {
                if ($one->parent_id == 0) {

                    $key = array_search($one->id, array_column($allPagesTranslations, 'pages_id'));


                    //echo $key . '<br><br>';

                    //echo $allPagesTranslations[$key]['menu_name'] . '<br><br>';

                    $menuItems[$menuItemsCount]['menu_name'] = $allPagesTranslations[$key]['menu_name'];
                    //$menuItems[$menuItemsCount]['title'] = $allPagesTranslations[$key]['title'];
                    //$menuItems[$menuItemsCount]['h1'] = $allPagesTranslations[$key]['h1'];
                    //$menuItems[$menuItemsCount]['text1'] = $allPagesTranslations[$key]['text1'];
                    //$menuItems[$menuItemsCount]['text2'] = $allPagesTranslations[$key]['text2'];
                    $menuItems[$menuItemsCount]['parent_id'] = $menuItemsCount;
                    $menuItems[$menuItemsCount]['url'] = $one->url;

                    $menuItemsCount++;


                    foreach ($allPages as $two) {

                        if (($two->parent_id <> 0) && ($two->parent_id == $one->id)) {


                            $keyParent = array_search($two->id, array_column($allPagesTranslations, 'pages_id'));


                            //echo $keyParent . '<br><br>';

                            //echo $allPagesTranslations[$keyParent]['menu_name'] . '<br><br>';


                            $menuItemsParent[$menuItemsCount - 1][$menuItemsParentCount]['menu_name'] = $allPagesTranslations[$keyParent]['menu_name'];
                            //$menuItemsParent[$menuItemsCount - 1][$menuItemsParentCount]['title'] = $allPagesTranslations[$keyParent]['title'];
                            //$menuItemsParent[$menuItemsCount - 1][$menuItemsParentCount]['h1'] = $allPagesTranslations[$keyParent]['h1'];
                            //$menuItemsParent[$menuItemsCount - 1][$menuItemsParentCount]['text1'] = $allPagesTranslations[$keyParent]['text1'];
                            //$menuItemsParent[$menuItemsCount - 1][$menuItemsParentCount]['text2'] = $allPagesTranslations[$keyParent]['text2'];
                            $menuItemsParent[$menuItemsCount - 1][$menuItemsParentCount]['url'] = $two->url;

                            $menuItemsParentCount++;
                        }


                    }


                }
            }
        }
        return ['menuItems' => $menuItems, 'menuItemsParent' => $menuItemsParent];
    }



    /*
     * public function onePagesTranslations($languages_name,$url)
     *
     * В этой функции мы возвращаем все поля из таблицы pages_text
     * Соответствующие данной странице $url
     * И соответствующие данному языку $languages_name
     *
     * */

    public function onePagesTranslations($languagesId,$url)
    {

       if($pages = Pages::find()->andWhere(['url' => $url])->one()){

        } else {

            throw new NotFoundHttpException('404');

        }

        $pagesTranslation = PagesText::find()->andWhere(['pages_id' => $pages->id])->andWhere(['languages_id' => $languagesId])->one();
       // echo print_r($pagesTranslation);

        return $pagesTranslation;

    }

    /*
     * public function translateButtons($model)
     *
     * В данной функции мы создаем кнопки для переводов для страницы pages в админке
     *
     *
     * $model->languages - public function getLanguages()
     * Вызывает все используемые поля из таблицы languages которые используются для переводов
     * в таблице pages_text
     *
     * Languages::getAllLanguages()
     * Вызывает все поля таблицы languages.
     *
     *ArrayHelper::map - создает из объекта двумерный массив
     *
     *
     *Создаем несколько небходимых массивов
     *
     * Запускаем цикл проходим по всем языкам доступным в системе
     *
     * Если В массиве уже добавленных языков для этой строки имеется язык то
     *
     * записываем в $text зеленую со своими ссылками на редактированеие языка
     *
     * Если не находим этот язык как используемый то записываем в текст синюю кнопку со ссылкой
     * на создание языка.
     *
     *
    */
    public function translateButtons($model){

        $text='';
        $allLanguages=ArrayHelper::map(Languages::getAllLanguages(),'id','url');
        $allLanguagesInverse=ArrayHelper::map(Languages::getAllLanguages(),'url','id');
        $onLanguages=ArrayHelper::map($model->languages,'url','id');
        $onPagesText=ArrayHelper::map($model->pagesTextId,'languages_id','id');

        foreach ($allLanguages as $one) {


            if (isset($onLanguages[$one])) {

                $text .= '<a class="btn btn-success" href="/pages-text/update?id=' . $onPagesText[$onLanguages[$one]] . '&languages=' .$onLanguages[$one]. '&pages=' .$model->id. '"><span class="fa fa-check"></span> ' . $one . ' </a> ';

            } else {

                $text .= '<a class="btn btn-primary" href="/pages-text/create?languages=' . $allLanguagesInverse[$one] . '&pages='. $model->id .'"><span class="fa fa-times"></span> ' . $one . ' </a> ';
            }

        }

        return $text;

    }


    public function embedPagesSelect($allPages,$allPagesTranslations)
    {

        $embedPagesSelectCount = 0;
        $embedPagesSelect = 0;

        $embedPagesSelect = array();


        foreach ($allPages as $one) {

            if ($one->embed) {


                $key = array_search($one->id, array_column($allPagesTranslations, 'pages_id'));

                $embedPagesSelect[$embedPagesSelectCount]['plates_title'] = $allPagesTranslations[$key]['plates_title'];
                $embedPagesSelect[$embedPagesSelectCount]['url'] = $one->url;

                $embedPagesSelectCount++;


            }
        }
        return $embedPagesSelect;
    }







}

<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.08.19
 * Time: 18:06
 */


/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $pages \common\models\Pages */

$this->params['pagesTranslations'] = $pagesTranslations;
$this->params['currentLanguages'] = $currentLanguages;
$this->params['languagesSwitcher'] = $languagesSwitcher;
$this->params['menuItems'] = $menuItems;
$this->params['mainPageCategories'] = $mainPageCategories;
$this->params['currentPageId'] = $currentPageId;
$this->params['allAdvertising'] = $allAdvertising;
$this->params['pages'] = $pages;
$this->params['alternate'] = $alternate;
$this->params['canonical'] = $canonical;
//$this->params['isEmbed'] = $isEmbed;


?>

<?php
//mysqli_query(,'SET NAMES ISO-8859-1' );
/*$test = \common\models\Songs::find()->andWhere(['id' => '36'])->one();
echo '<p>';
echo   json_encode('So now I am older
Than my mother and father
When they had their daughter
Now what does that say about me?
Oh, how could I dream of
Such a selfless and true love
Could I wash my hands of
Just looking out for me
Oh man, what I used to be
Oh man, oh my, oh me
Oh man, what I used to be
Oh man, oh my, oh me
In dearth or in excess
Both the slave and the empress
Will return to the dirt, I guess
Naked as when they came
I wonder if I\'ll see
Any faces above me
Or just cracks in the ceiling
Nobody else to blame
Oh man, what I used to be
Oh man, oh my, oh me
Oh man, what I used to be
Oh man, oh my, oh me
Gold teeth and gold jewelry
Every piece of your dowry
Throw them into the tomb with me
Bury them with my name
Unless I have someday
Ran my wandering mind away
Oh man, what I used to be
Montezuma to Tripoli
Oh man, oh my, oh me');
echo '<br><br>';


echo   $test->body;
echo '<br><br>';
echo   json_encode($test->body);
echo '<br><br>';
echo json_encode('[Intro: Fat Joe]<br>(<i>After laughter comes tears</i>)<br>(<i>After laughter comes tears</i>) The dynamic, family ties<br><br>[Chorus: Fat Joe &amp; <i>Dre</i>]<br>Open up shop, work \'round the clock<br><i>First-class services, lines down the block</i><br>I storm in glasses, my VIP fiends got priority passes (<i>Oh, God</i>)<br><i>I\'m morally asked this question<br>What do you believe in?</i> Heaven or Hell?<br><i>Wait, what do you believe in?</i> Heaven or Hell?<br><i>Yeah, what do you believe in?</i> Heaven or Hell?<br>
');
echo '<br><br>';

echo '<pre>' . $test->body . '</pre>';
echo '</p>';
*/
?>


<div class="container  container-no-top-padding-extended">

    <div class="h1-main">
        <img src="/files/category-icons/<?=$currentPageId?>.jpg"
             alt="<?= $this->params['pagesTranslations']->h1 ?>"
             width="70" height="70" class="h1-img">

        <div class="h1-and-breadcrumbs">
        <h1 class="h1-all"><?= $this->params['pagesTranslations']->h1 ?></h1>

            <span class="breadcrumbs"><?=Yii::t('app','Home')?></span>
        </div>



    </div><br>
    <p><?= $this->params['pagesTranslations']->text1 ?></p>

    <?= $this->render('/partials/ads/_ads_1', [
        'allAdvertising' => $this->params['allAdvertising']])
    ?>

    <div class="row row-padding margin-top">
        <div class="col-lg-9 col-xs-12 div-left">
            <?php foreach ($this->params['mainPageCategories']['mainPageItems'] as $item): ?>

                <?php //echo print_r($item);?>


                <h2><?= $item['index_name']; ?></h2>
                <div class="row  row-flex"><a href="/<?= $this->params['currentLanguages']->url; ?>/<?= $item['url']; ?>/"
                                              class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12 main-pages-extended">
                        <div class="plates">

                            <p><img class="plates-img" src="/files/category-icons/<?=$item['id']?>.png"
                                    alt="<?= $item['plates_title'] ?>"
                                    width="50"></p>

                            <p class="plates-title"><?= $item['plates_title']; ?></p>
                            <p class="plates-under-title"><?php // $item['h1']; ?></p>
                        </div>
                    </a>

                    <?php if (isset($this->params['mainPageCategories']['mainPageItemsParent'][$item['parent_id']])): ?>
                        <?php foreach ($this->params['mainPageCategories']['mainPageItemsParent'][$item['parent_id']] as $itemParent): ?>


                            <a href="/<?= $this->params['currentLanguages']->url; ?>/<?= $itemParent['url']; ?>/"
                               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12 main-pages-extended">
                                <div class="plates">
                                    <p>
                                        <img class="plates-img" src="/files/category-icons/<?=$itemParent['id']?>.png"
                                             alt="<?= $itemParent['plates_title'] ?>"
                                             width="50">
                                    </p>
                                    <p class="plates-title">
                                        <?= $itemParent['plates_title']; ?>
                                    </p>
                                    <p class="plates-under-title"><?php // $itemParent['short_description']; ?></p></div>
                            </a>


                        <?php endforeach ?>
                    <?php endif; ?>

                </div>

            <?php endforeach ?>
            <p>
                <?php if ($this->params['pagesTranslations']->text2):?>
                <?= $this->params['pagesTranslations']->text2 ?>
                <?php endif;?>
            </p>
        </div>

        <div class="form-right col-sm-3">



            <?= $this->render('/partials/ads/_ads_2', [
                'allAdvertising' => $allAdvertising])
            ?>

        </div>
    </div>
</div>


<?php //\common\models\Pages::mainPageCategories($currentLanguages->id); ?>















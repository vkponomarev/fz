<?php

/* @var $this \yii\web\View */
/* @var $content string */


?>

<?php if (!$this->params['isEmbed']): ?>
<?php foreach ($this->params['parentPageCategories']['mainPageItems'] as $item): ?>

    <?php //echo print_r($item);?>

    <div class="row row-flex">


        <?php if (isset($this->params['parentPageCategories']['mainPageItemsParent'][$item['parent_id']])): ?>
            <?php foreach ($this->params['parentPageCategories']['mainPageItemsParent'][$item['parent_id']] as $itemParent): ?>

                <a href="/<?= $this->params['currentLanguages']->url; ?>/<?= $itemParent['url']; ?>/"
                   class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-6 main-pages-extended">
                    <div class="plates"><p><img class="plates-img" src="/files/category-icons/<?=$itemParent['id']?>.png"
                                                alt="<?= $itemParent['plates_title'] ?>"
                                                width="50"></p>
                        <p class="plates-title"><?= $itemParent['plates_title']; ?></p>
                        <p class="plates-under-title"><?php // $itemParent['short_description']; ?></p></div>
                </a>

            <?php endforeach ?>
        <?php endif; ?>

    </div>

<?php endforeach; ?>
<?php endif;?>

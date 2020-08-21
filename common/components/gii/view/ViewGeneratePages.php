<?php

namespace common\components\gii\view;


class ViewGeneratePages
{


    function generate($languagesData)
    {

        $view = new View();
        $view->generatePagesIndex($languagesData);
        $view->generatePagesArtists($languagesData);
        $view->generatePagesAlbums($languagesData);
        $view->generatePagesSongs($languagesData);

    }

}

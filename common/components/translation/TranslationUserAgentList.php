<?php

namespace common\components\translation;

use Yii;
use yii\web\NotFoundHttpException;

class TranslationUserAgentList
{

    public function userAgent()
    {

        $userAgentList = [
            'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.8) Gecko/20061201 Firefox/2.0.0.8',
'Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.8.1.8) Gecko/20071022 Ubuntu/7.10 (gutsy) Firefox/2.0.0.8',
'Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.8.1.8) Gecko/20071008 Ubuntu/7.10 (gutsy) Firefox/2.0.0.8',
'Mozilla/5.0 (X11; U; OpenBSD i386; en-US; rv:1.8.1.7) Gecko/20070930 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux x86_64; pl; rv:1.8.1.7) Gecko/20071009 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.8.1.7) Gecko/20070918 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.8.1.6) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.7) Gecko/20070923 Firefox/2.0.0.7 (Swiftfox)',
'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.7) Gecko/20070921 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7 (Ubuntu-feisty)',
'Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.8.1.6) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux i386; en-US; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux Gentoo; pl-PL; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Linux amd64; en-US; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (X11; U; Gentoo Linux x86_64; pl-PL; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (Windows; U; Windows NT 6.0; it-IT; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
'Mozilla/5.0 (Windows; U; Windows NT 6.0; fr; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7',
            'Opera/9.26 (Windows NT 5.1; U; zh-cn)',
'Opera/9.26 (Windows NT 5.1; U; pl)',
'Opera/9.26 (Windows NT 5.1; U; nl)',
'Opera/9.26 (Windows NT 5.1; U; MEGAUPLOAD 2.0; en)',
'Opera/9.26 (Windows NT 5.1; U; de)',
'Opera/9.26 (Macintosh; PPC Mac OS X; U; en)',
            'ELinks/0.13.GIT (textmode; Linux 2.6.29 i686; 119x51-2)',
'ELinks/0.13.GIT (textmode; Linux 2.6.27-rc6.git i686; 175x65-3)',
'ELinks/0.13.GIT (textmode; Linux 2.6.26-rc7.1 i686; 119x68-3)',
'ELinks/0.13.GIT (textmode; Linux 2.6.24-1-686 i686; 175x65-2)',
'ELinks/0.13.GIT (textmode; Linux 2.6.24-1-686 i686; 138x60-2)',
'ELinks/0.13.GIT (textmode; Linux 2.6.22-3-686 i686; 84x37-2)',
'ELinks/0.13.GIT (textmode; Linux 2.6.22-3-686 i686; 104x48-2)',
'ELinks/0.13.GIT (textmode; Linux 2.6.22-2-686 i686; 148x68-3)'
        ];


        //$userAgent = array_rand($userAgentList, 1);
        return $userAgentList;

    }

}


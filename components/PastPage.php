<?php

namespace app\components;

use yii\base\Component;
use Yii;

class PastPage extends Component
{
    //
    public function getPage()
    {
        $page = Yii::$app->request->absoluteUrl;
        Yii::$app->session->set('page', $page);
    }

}
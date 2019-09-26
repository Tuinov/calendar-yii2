<?php

use yii\base\Behavior;
use yii\db\ActiveRecord;


class CachedRecordBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_UPDATE => 'clearCache',
            ActiveRecord::EVENT_AFTER_INSERT => 'clearCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'clearCache',
        ];
    }

    public function clearCache()
    {

        Yii::$app->cache->delete('todayActivity');
    }
}
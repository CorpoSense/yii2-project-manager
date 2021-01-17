<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class ProjectesFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Projects';
    public $dataFile = '@tests/_data/projects.php';
}

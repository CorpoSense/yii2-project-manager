<?php

namespace tests\acceptance\admin;

use AcceptanceTester;
use app\tests\fixtures\ProjectesFixture;
use yii\helpers\Url;

class ProjectsCest
{
    function _before(AcceptanceTester $I)
    {
        $I->haveFixtures([
            'projects' => [
                'class' => ProjectesFixture::class,
                'dataFile' => codecept_data_dir() . 'projects.php'
            ]
        ]);
    }

    public function testIndex(AcceptanceTester $I)
    {
        $I->wantTo('ensure that projects index page works');
        $I->amOnPage(Url::to(['/projects/index']));
        $I->see('Projects', 'h1');
    }

    public function testView(AcceptanceTester $I)
    {
        $I->wantTo('ensure that projects view page works');
        $I->amOnPage(Url::to(['/projects/view', 'id' => 1]));
        $I->see('First Projects', 'h1');
    }

    public function testCreate(AcceptanceTester $I)
    {
        $I->wantTo('ensure that projects create page works');
        $I->amOnPage(Url::to(['/projects/create']));
        $I->see('Create', 'h1');

        $I->fillField('#projects-title', 'Projects Create Title');
        $I->fillField('#projects-text', 'Projects Create Text');
        $I->selectOption('#projects-title', 'Best Project');

        $I->click('submit-button');
        $I->wait(3);

        $I->expectTo('see view page');
        $I->see('Projects Create Title', 'h1');
    }

    public function testDelete(AcceptanceTester $I)
    {
        $I->amOnPage(Url::to(['/projects/view', 'id' => 3]));
        $I->see('Title For Deleting', 'h1');

        $I->click('Delete');
        $I->acceptPopup();
        $I->wait(3);

        $I->see('Projects', 'h1');
    }
}

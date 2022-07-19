<?php

namespace page\controllers;

use crud\controllers\CRUDController;
use page\models\Page;
use page\models\PageSearch;

class BackendController extends CRUDController
{

    public function getModelClass()
    {
        return Page::class;
    }

    public function getModelSearch()
    {
        return new PageSearch;
    }

    public function getPermissionPrefix()
    {
        return 'page';
    }

}

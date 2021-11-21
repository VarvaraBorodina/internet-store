<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\Product;
use mysqli;

class SiteController
{
    public function index()
    {
        render('main.php');
    }

    public function notFound()
    {
        render('404.php');
    }

}
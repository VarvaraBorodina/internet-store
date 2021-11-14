<?php

namespace App\Controllers;

class SiteController
{
    public function index()
    {
        include __DIR__.'/../../views/main.php';
    }

    public function notFound()
    {
        include __DIR__.'/../../views/404.php';
    }

}
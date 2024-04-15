<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

class DashboardController
{
    public function index()
    {
        return view('backoffice.dashboard.index');
    }
}

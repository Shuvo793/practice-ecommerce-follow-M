<?php


namespace App\Controllers\BackEnd;


class DashboardController
{
    public function getIndex(){
        backendView('dashboard');
    }

}
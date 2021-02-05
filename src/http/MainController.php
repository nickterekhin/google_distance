<?php


namespace TD\http;


class MainController extends Controller
{

    protected function index()
    {
        return $this->view('main');
    }
}
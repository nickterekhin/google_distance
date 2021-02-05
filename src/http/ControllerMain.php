<?php


namespace TD\http;


class ControllerMain extends Controller
{

    protected function index()
    {
        return $this->view('index');
    }
}
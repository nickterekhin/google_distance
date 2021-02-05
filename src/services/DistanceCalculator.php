<?php


namespace TD\services;


abstract class DistanceCalculator
{
    /**
     * @var APIRequest
     */
    protected $api_request;


    public function __construct()
    {
        $this->api_request = new APIRequest();
    }

    abstract public function calculate($fromZip,$toZip);
}
<?php


namespace TD\services;


class GoogleDistanceCalculator extends DistanceCalculator
{
    private $key_api = '';
    private $google_url_api = 'https://maps.googleapis.com/maps/api/distancematrix/';

    public function calculate($fromZip,$toZip)
    {
                  return $this->api_request->get($this->google_url_api.'json?origins='.$fromZip.'&destinations='.$toZip.'&key='.$this->key_api);
    }

    /**
     * @param mixed $key_api
     */
    public function setKeyApi($key_api)
    {
        $this->key_api = $key_api;
    }


}
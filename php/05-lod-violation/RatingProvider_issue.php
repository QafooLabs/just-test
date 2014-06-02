<?php

class RatingProvider
{
    private $appRegistry;

    public function __construct(AppRegistry $appRegistry)
    {
        $this->appRegistry = $appRegistry;
    }

    public function loadRating($productId)
    {
        $httpClient = $this->appRegistry->get('http_client');
        $url = sprint('http://...?city=%s', $location->city);
        $response = $httpClient->get($url);

        if ($response->getStatusCode() !== 200){
            throw new \RuntimeException('Could not retrieve rating.');
        }
        return json_decode($response->getBody());
    }
}

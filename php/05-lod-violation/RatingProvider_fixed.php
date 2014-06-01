<?php


class RatingProvider
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function loadRating($productId)
    {
        $url = sprint('http://...?city=%s', $location->city);
        $response = $this->httpClient->get($url);

        if ($response->getStatusCode() !== 200){
            throw new \RuntimeException('Could not retrieve rating.');
        }
        return json_decode($response->getBody());
    }
}

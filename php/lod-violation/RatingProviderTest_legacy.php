<?php

class RatingProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRatingProcessedCorrectly()
    {
        $httpResponse = new HttpResponse(200, 4.6);

        $httpClientMock = $this->getMockBuilder('HttpClient')
            ->getMock();
        $httpClientMock->expects($this->any())
            ->method('get')
            ->will($this->returnValue($httpResponse));

        $appRegistry = new AppRegistry();
        $appRegistry->set('http_client', $httpClient);

        $ratingProvider = new RatingProvider($appRegistry);

        $this->assertEquals(
            4.6,
            $ratingProvider->loadRating(23)
        );
    }
}

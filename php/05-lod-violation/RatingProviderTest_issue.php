<?php

class RatingProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRatingProcessedCorrectly()
    {
        $appRegistryMock = $this->getMockBuilder('AppRegistry')
            ->disableOriginalConstructor()
            ->getMock();

        $httpClientMock = $this->getMockBuilder('HttpClient')
            ->getMock();

        $httpResponseMock = $this->getMockBuilder('HttpResponse')
            ->disableOriginalConstructor()
            ->getMock();

        $httpResponseMock->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue(200));
        $httpResponseMock->expects($this->any())
            ->method('getBody')
            ->will($this->returnValue(json_encode(4.6)));

        $httpClientMock->expects($this->any())
            ->method('get')
            ->will($this->returnValue($httpResponseMock));

        $appRegistryMock->expects($this->any())
            ->method('get')
            ->will($this->returnValue($httpClientMock));

        $ratingProvider = new RatingProvider($appRegistryMock);

        $this->assertEquals(
            4.6,
            $ratingProvider->loadRating(23)
        );
    }
}

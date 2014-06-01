<?php

class FileSystemLoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testLogDebugSuccess()
    {
        vfsStream::setup('test');
        $logFile = vfsStream::url('test') . '/message.log';

        $logger = new Logger($logFile);
        $logger->logDebug('Some message.', 'with data');

        $this->assertTrue(
            vfsStreamWrapper::getRoot()->hasChild('message.log')
        );
        $this->assertEquals(
            "Some message. (with data)\n",
            file_get_contents($logFile)
        );
    }
}

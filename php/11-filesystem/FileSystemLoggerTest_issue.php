<?php

class FileSystemLoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testLogDebugSuccess()
    {
        $tmpLogFile = $this->getTempFileName();

        $logger = new Logger($tmpLogFile);
        $logger->logDebug('Some message.', 'with data');

        $this->assertEquals(
            "Some message. (with data)\n",
            file_get_contents($tmpLogFile)
        );
        unlink($tmpLogFile);
    }
}

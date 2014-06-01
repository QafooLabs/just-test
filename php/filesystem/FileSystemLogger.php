<?php

class FileSystemLogger extends Logger
{
    public function __construct($fileName)
    {
        // ... error checks ...
        $this->fileHandle = fopen($fileName, 'a');
    }
    public function logDebug($message, $data)
    {
        fwrite(
            $this->fileHandle,
            sprintf(
                "%s (%s)\n",
                $message,
                $data
            )
        );
    }
}

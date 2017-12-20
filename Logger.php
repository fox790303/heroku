<?php
/**
 * For separator log file.
 */
class Logger
{
    const LOG_LEVEL_INFO = 'INFO';
    const LOG_LEVEL_DEBUG = 'DEBUG';
    const LOG_LEVEL_WARN = 'WARN';
    const LOG_LEVEL_ERROR = 'ERROR';
    const LOG_LEVEL_FATAL = 'FATAL';

    const LOG_LEVEL_INFO_NUM = 4;
    const LOG_LEVEL_DEBUG_NUM = 3;
    const LOG_LEVEL_WARN_NUM = 2;
    const LOG_LEVEL_ERROR_NUM = 1;
    const LOG_LEVEL_FATAL_NUM = 0;

    const LOG_FORMAT = "%s.%06d|%5s|%6d|%s\n";
    const DATE_FORMAT = 'Y-m-d H:i:s';
    const TIMEZONE = 'Asia/Taipei';

    private $fileName;
    private $logLevelNum;
    private $pid;

    /**
     * constructor.
     *
     * @param string $fileName log file prefix name
     */
    public function __construct($fileName)
    {
        file_exists('./logs') or mkdir('./logs');
        $this->fileName = './logs/'.$fileName.'.%s.log';
        $this->pid = getmypid();
    }

    /**
     * info level.
     *
     * @param string $content log content
     *
     * @return
     */
    public function info($content)
    {
        $this->writeLog(self::LOG_LEVEL_INFO, $content);
    }

    /**
     * debug level.
     *
     * @param string $content log content
     *
     * @return
     */
    public function debug($content)
    {
        $this->writeLog(self::LOG_LEVEL_DEBUG, $content);
    }

    /**
     * warn level.
     *
     * @param string $content log content
     *
     * @return
     */
    public function warn($content)
    {
        $this->writeLog(self::LOG_LEVEL_WARN, $content);
    }

    /**
     * error level.
     *
     * @param string $content log content
     *
     * @return
     */
    public function error($content)
    {
        $this->writeLog(self::LOG_LEVEL_ERROR, $content);
    }

    /**
     * fatal levvel.
     *
     * @param string $content log content
     *
     * @return
     */
    public function fatal($content)
    {
        $this->writeLog(self::LOG_LEVEL_FATAL, $content);
    }

    private function writeLog($level, $content)
    {
		$microtime = sprintf("%06d", explode(" ", microtime())[0] * 1000000);
		$fname = sprintf($this->fileName, date('Y-m-d'));
        $content = sprintf(self::LOG_FORMAT,
             date(self::DATE_FORMAT), $microtime, $level, $this->pid, $content);
        file_put_contents($fname, $content, FILE_APPEND | LOCK_EX);
    }
}

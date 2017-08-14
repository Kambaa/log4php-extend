<?php
/**
 * Created by PhpStorm.
 * User: yg
 * Date: 8/14/17
 * Time: 4:34 PM
 */

class JsonLogger extends LoggerAppender
{
    /**
     * Used to mark first append. Set to false after first append.
     * @var boolean
     */
    protected $firstAppend = true;

    /**
     * If set to true, a <br /> element will be inserted before each line
     * break in the logged message. Default value is false. @var boolean
     */
    protected $htmlLineBreaks = false;

    public function close()
    {
        if ($this->closed != true) {
            if (!$this->firstAppend) {
                echo $this->layout->getFooter();
            }
        }
        $this->closed = true;
    }

    public function append(LoggerLoggingEvent $event)
    {
        $out=[];
        if ($this->layout !== null) {
            $out['header']=$this->layout->getHeader();
            $out['message'] = $this->layout->format($event);
            if ($this->firstAppend) {
                $this->firstAppend=false;
            }
            echo json_encode($out,JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Sets the 'htmlLineBreaks' parameter.
     * @param boolean $value
     */
    public function setHtmlLineBreaks($value)
    {
        $this->setBoolean('htmlLineBreaks', $value);
    }

    /**
     * Returns the 'htmlLineBreaks' parameter.
     * @returns boolean
     */
    public function getHtmlLineBreaks()
    {
        return $this->htmlLineBreaks;
    }
}
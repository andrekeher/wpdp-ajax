<?php

namespace AndreKeher\WPDP;

class Ajax
{
    private $action;
    private $function;
    private $public;
    
    public function __construct($action, $public = false)
    {
        $this->action = $action;
        $this->public = $public;
    }
    
    /**
     * Ajax::getAction()
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * Ajax::setAction()
     *
     * @param string $action
     *
     * @return void
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    /**
     * Ajax::setFunction()
     *
     * @param callable $function
     *
     * @return void
     */
    public function setFunction(callable $function)
    {
        $this->function = $function;
    }
    
    
    /**
     * Ajax::getPublic()
     *
     * @return bool
     */
    public function getPublic()
    {
        return $this->public;
    }
    
    /**
     * Ajax::setPublic()
     *
     * @param bool $public
     *
     * @return void
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }
    
    /**
     * Ajax::init()
     *
     * @return void
     */
    public function init()
    {
        if (empty($this->action) && empty($this->function)) {
            return false;
        }
        add_action('wp_ajax_' . $this->action, $this->function);
        if ($this->public === true) {
            add_action('wp_ajax_nopriv_' . $this->action, $this->function);
        }
    }
}

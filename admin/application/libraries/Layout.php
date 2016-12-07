<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout
{
    public $data = array();
    public $view = null;
    public $viewFolder = null;
    public $layoutsFolder = 'layouts';
    public $layout = 'default';
    var $obj;

    function __construct()
    {
        $this->obj =& get_instance();
    }

    function setLayout($layout)
    {
        $this->layout = $layout;
    }
    function setLayoutFolder($layoutFolder)
    {
        $this->layoutsFolder = $layoutFolder;
    }

    function render()
    {

        $controller = $this->obj->router->fetch_class();
        $method = $this->obj->router->fetch_method();
        $viewFolder = !($this->viewFolder) ? $controller.'.views' : $this->viewFolder . '.views';
        $view = !($this->view) ? $method : $this->view;

        $loadedData = array();
        $loadedData['view'] = $viewFolder.'/'.$view;
        $loadedData['data'] = $this->data;

        $layoutPath = '/'.$this->layoutsFolder.'/'.$this->layout;
		
        $this->obj->load->view($layoutPath, $loadedData);
    }
}
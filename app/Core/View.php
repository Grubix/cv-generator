<?php

namespace App\Core;

class View {

    protected $file;

    protected $data;

    public function __construct(string $file, array $data = []) {
        $file = TEMPLATES_DIR . $file;

        if(!file_exists($file)) {
            throw new \Exception("Template file '$file' does not exist");
        }

        $this->file = $file;
        $this->assign($data);
    }

    public function assign(array $data) {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    public function assignHelper(string $name, \Closure $func) {
        $this->data[$name] = \Closure::bind($func, $this, self::class);
    }

    public function isset(string $property) : bool {
        return isset($this->data[$property]) && null !== $this->data[$property];
    }

    public function render(array $data = null) {
        if($data) {
            $this->assign($data);
        }

        include $this->file;
    }

    public function renderToString(array $data = null) : string {
        if($data) {
            $this->assign($data);
        }

        ob_start();
        include $this->file;
        return ob_get_clean();
    }

    public function include(string $file) {
        $file = TEMPLATES_DIR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $file);

        if(file_exists($file)) {
            include $file;
        } else {
            throw new \Exception("Template file '$file' does not exist");
        }
    }

    public function asset(string $name, bool $absolute = false) { //TODO $absolute
        $path = PUBLIC_DIR . $name;

        if(!file_exists($path)) {
            return 'File not found';
        }

        return PUBLIC_RELATIVE_DIR . $name . '?' . rand();
    }

    public function route(string $name, $params = [], $absolute = false) {
        return \App\App::getRouter()->getRoutes()->get($name)->getUrl($params, $absolute);
    }

    public function csrfToken() {
        return $_SESSION[CSRF_TOKEN] ?? null;
    }

    public function csrfInput(string $javascriptId = 'js-' . CSRF_TOKEN) {
        if(!isset($_SESSION[CSRF_TOKEN])) {
            return "<p style='color: red'>Undefined token</p>";
        }

        return '<input type="hidden" name="' . CSRF_TOKEN .
            '" value="' . $_SESSION[CSRF_TOKEN] .
            '" id="'. $javascriptId .'"/>';
    }

    public function __get($name) {
        if(!isset($this->data[$name])) {
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
            $file = basename($backtrace['file']);
            $line = $backtrace['line'];

            echo "<p style='color: red'><b>{Undefined variable '$name'</b> ($file:$line)}</p>";
            return null;
        } else {
            return $this->data[$name];
        }
    }

}
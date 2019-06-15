<?php

/**
 * Класс для отладки кода.
 */

namespace application\lib;

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Dev
{
    protected $output;

    /**
     * Возвращает отладочную ионформацию в виде строки.
     * @param $val
     * @return string
     */
    public function dd($val)
    {
        $this->output = '<pre>'.$val.'</pre>';
        return $this->output;
    }
}
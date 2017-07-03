<?php

class ezHook extends ezBase
{
    protected $confNode = 'hook';

    public function getHook($route)
    {
        if (empty($this->conf[$route['control']]))
            return $this->conf['default'];
        $hookControl = $this->conf[$route['control']];
        if (empty($hookControl[$route['methon']]))
            return $hookControl['default'];
        return $hookControl[$route['methon']];
    }
}
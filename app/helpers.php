<?php

function showMessage($msg = '', $status = '')
{
    session()->flash('flash', array('message' => $msg, 'status' => $status));
}

function set_active($path, $active = 'active')
{
    return Request::is($path) ? $active : '';
}

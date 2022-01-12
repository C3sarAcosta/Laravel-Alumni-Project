<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Constants
use App\Constants\Constants;

abstract class ConfigurationController extends Controller
{
    protected $notification;

    public function __construct()
    {
        $this->notification = array(
            'message' => '',
            'alert-type' => Constants::ALERT_TYPE['Info']
        );
    }
    abstract protected function view();

    abstract protected function add();

    abstract protected function store(Request $request);

    abstract protected function edit($id);

    abstract protected function update(Request $request);
}

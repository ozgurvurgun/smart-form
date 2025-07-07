<?php

namespace Smartlab\ParticipantForm\Controllers\Api;

use Smartlab\ParticipantForm\Core\Http\Response;

class ApiController
{
    public function hello()
    {
        Response::json(['message' => 'Hello, API!']);
    }
}

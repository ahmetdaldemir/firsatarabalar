<?php

namespace App\Contracts;

use App\Models\RemoteApiLog;

interface HyperRequest
{
    function getStatusCode();

    function getContent();

    function getLog(): ?RemoteApiLog;

    function hasErrors();

    function getErrors();

}
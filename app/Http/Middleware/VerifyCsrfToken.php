<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'payment/*',  // exclude all URLs wit payment/ prefix
        'isbankresponse',  // exclude all URLs wit payment/ prefix
        'form1',
        'form2',
        'form3',
        'form4',
        'form5',
    ];
}

<?php

namespace App\Exceptions;

use App\Traits\HasErrors;
use Exception;

class CustomException extends Exception
{

    use HasErrors;
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $this->addErrors($this);
        return response()->view(
            'errors.custom',
            array(
                'exception' => $this
            )
        );
    }
}
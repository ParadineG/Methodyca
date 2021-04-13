<?php
namespace App\Actions\Fortify;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaptchaValidation
{
    public function __invoke(Request $request, $next)
    {
        Validator::make($request->all(), [
            'token2' => ['required', new Recaptcha()],
        ])->validate();

        return $next($request);
    }
}

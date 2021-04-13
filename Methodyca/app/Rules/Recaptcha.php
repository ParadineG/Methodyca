<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{

    public function __construct()
    {

    }


    public function passes($attribute, $value)
    {
        $data = array(
            'secret'   => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $value
        );
        error_log(env('GOOGLE_RECAPTCHA_SECRET'));
        try {
            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
            if(json_decode($response)->score > 0.5)
                return true;
            else
                return false;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function message()
    {
        return 'ReCaptcha verification failed.';
    }
}

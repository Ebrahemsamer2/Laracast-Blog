<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsletterInterface;

use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{
    public function __invoke(NewsletterInterface $newsletter)
    {
        request()->validate(['email' => 'required|email']);
        try
        {
            $newsletter->subscribe(request('email'));    
        }
        catch(\Exception $e)
        {
            throw ValidationException::withMessages([
                'email' => 'This email can not be added to our newsletter list'
            ]);
        }
    
        return redirect('/')->with('success', 'you are now signed uo for our newsletter.');
    }
}

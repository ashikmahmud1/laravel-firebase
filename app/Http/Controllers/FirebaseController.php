<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    //
    public function index()
    {
        $firebase = (new Factory)
        ->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database   =   $firebase->createDatabase();
        $createPost    =   $database
            ->getReference('blog/posts')
            ->push([
                'title' =>  'Laravel 6',
                'body'  =>  'This is really a cool database that is managed in real time.'

            ]);

        echo '<pre>';
        print_r($createPost->getvalue());
        echo '</pre>';
    }
}

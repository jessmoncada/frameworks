<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'title' => 'Slide 1',
                'content' => 'Contenido del slide 1',
                'image' => (asset('images/png/origami2.png')),
            ],
            [
                'title' => 'Slide 2',
                'content' => 'Contenido del slide 2',
                'image' => (asset('images/png/origami3.png')),

            ],
            [
                'title' => 'Slide 3',
                'content' => 'Contenido del slide 3',
                'image' => (asset('images/png/origami4.png')),

            ],
            // Agrega más elementos de slide según sea necesario
        ];

        return view('welcome', compact('slides'));
    }
}

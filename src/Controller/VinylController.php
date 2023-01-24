<?php

namespace App\Controller;

use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {

        $tracks = [
            ['song' => 'Smells Like Teen Spirit', 'artist' => 'Nirvana'],
            ['song' => 'Loser', 'artist' => 'Beck'],
            ['song' => 'Ironic', 'artist' => 'Alanis Morissette'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Linger', 'artist' => 'The Cranberries'],

        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}
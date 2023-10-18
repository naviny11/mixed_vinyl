<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController extends AbstractController
{
    #[Route('/vinyl', name: 'app_vinyl')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/VinylController.php',
        ]);
    }

    #[Route('/homepage')]
    public function homepage(): Response
    {
        $tracks = [
            'Namo Namo',
            'Chikni chameli',
            'enna sonna',
            'ammche papa ne gampati aanla'
        ];
        return $this->render('vinyl/homepage.html.twig',[
            'title' => 'PB and Jams',
            'tracks' => $tracks

        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response 
    {
        $title = $slug == null ? 'All Genres' : $slug;

        return new Response('Genre: '.$title);
    }
}

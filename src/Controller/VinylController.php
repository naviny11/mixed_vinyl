<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

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

    #[Route('/', name:'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            'Namo Namo',
            'Chikni chameli',
            'enna sonna',
            'ammche papa ne gampati aanla'
        ];
        //dd($tracks);
        return $this->render('vinyl/homepage.html.twig',[
            'title' => 'PB and Jams',
            'tracks' => $tracks

        ]);

        /* $html = $twig->render('vinyl/homepage.html.twig',[
            'title' => 'PB and Jams',
            'tracks' => $tracks

        ]);

        return new Response($html); */
    }

    #[Route('/browse/{slug}', name:'app_browse')]
    public function browse(string $slug = null): Response 
    {

        return $this->render('/vinyl/browse.html.twig',[
            'title' => $slug
        ]);
    }
}

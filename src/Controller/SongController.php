<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/song', name: 'app_song')]
    public function index(): Response
    {
        return $this->render('song/index.html.twig', [
            'controller_name' => 'SongController',
        ]);
    }

    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        //TODO : query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];

        //return new JsonResponse($song);

        $logger->info('Returning API reponse for song {song}',[
            'song' => $id,
        ]);

        return $this->json($song);

    }
}

<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Framework\WebLinkConfig;

class AfficheController extends AbstractController
{

    #[Route('/stats', name: 'app_stats')]
    public function index(ManagerRegistry $doctrine,): Response
    {
        $repo = $doctrine->getRepository(PFE::class);
        $PFEparEntreprise = $repo->countPFE();

        return $this->render('stats/index.html.twig', [
            'PFEparEntreprise' => $PFEparEntreprise
        ]);
    }
}

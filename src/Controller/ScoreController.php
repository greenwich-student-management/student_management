<?php

namespace App\Controller;

use App\Entity\Scoremanagement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
  /**
     * @Route("/score/{id}", name="FindId")
     */
    public function findIdAction(Scoremanagement $score): Response //tim theo id 
    {
        return $this->json($score);
    }
    
}

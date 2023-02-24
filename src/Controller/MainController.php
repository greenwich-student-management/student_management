<?php

namespace App\Controller;

use App\Entity\Studentmanagement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
     /**
     * @Route("/student", name="studentPage")
     */
    public function StudentPage(): Response
    {
        return $this->render('formstudent.html.twig', []);
    }
}


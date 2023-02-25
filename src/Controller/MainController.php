<?php

namespace App\Controller;

use App\Repository\StudentmanagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private StudentmanagementRepository $repo;
    public function __construct(StudentmanagementRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/home", name="homepage")
     */
    public function indexPageAction(): Response
    {
        $students = $this->repo->findAll();
        return $this->render('home.html.twig', [
            'students'=>$students
        ]);
    }
}
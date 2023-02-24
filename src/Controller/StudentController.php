<?php

namespace App\Controller;

use App\Repository\StudentmanagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{

/**
     * @Route("/image", name="profile")
     */
    public function list12(): Response
    {
        // return $this-> Json($this->products);
        $img = "khiem.jpg";  
        $filename = $this->getParameter('kernel.project_dir').'/public/image/'.$img;
        return new BinaryFileResponse($filename);
    }

  /**
   * @Route("/student", name="student_index")
   */
  public function index(StudentmanagementRepository $repo): Response
  {
    $student = $repo->findAll();
            return $this->render('student/index.html.twig', [
                'student' => $student
            ]);
  }

}


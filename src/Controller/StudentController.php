<?php

namespace App\Controller;

use App\Repository\StudentmanagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
<<<<<<< HEAD
   /**
    * @Route("Route", name="RouteName")
    */
   public function FunctionName(): Response
   {
       return $this->render('$0.html.twig', []);
   }
=======
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
>>>>>>> ac5786f69f08eb7df244a9182313a3cddafa8fab
}


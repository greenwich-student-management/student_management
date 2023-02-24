<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubjectController extends AbstractController
{
  /**
   * @Route("Route", name="RouteName")
   */
  public function FunctionName(): Response
  {
      return $this->render('$0.html.twig', []);
  }
}

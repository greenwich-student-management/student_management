<?php

namespace App\Controller;

use App\Repository\StudentmanagementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    // /**
    //  * @Route("/", name="searchByName")
    //  */
    // public function searchByNameAction(StudentmanagementRepositorytory $repo, Request $req): Response
    // {
    //     $name = $req->query->get('name');
    //     $student = $repo->searchByName($name);
    //     return $this->render('home.html.twig', [
    //         'students'=>$students
    //     ]);
    // }
    /**
     * @Route("/search", name="search")
     */
    public function searchAction(StudentmanagementRepository $repo, Request $req): Response
    {
        $getsearch = $req->query->get('search');
        $search = $repo->searchStudentName($getsearch);
        return $this->render('search/index.html.twig', [
            'search'=>$search
        ]);
    }
}

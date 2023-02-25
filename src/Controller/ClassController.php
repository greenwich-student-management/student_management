<?php

namespace App\Controller;

use App\Entity\Classmanagement;
use App\Entity\Studentmanagement;
use App\Repository\ClassmanagementRepository;
use ClassType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ClassController extends AbstractController
/**
 * @Route("/class")
 */
{
    private ClassmanagementRepository $repo;
    public function __construct(ClassmanagementRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="class_show")
     */
    public function readAllAction(): Response
    {
        $class = $this->repo->findAll();
        return $this->render('class/index.html.twig', [
            'class'=>$class
        ]);
    }
     /**
     * @Route("/{id}", name="class_read",requirements={"id"="\d+"})
     */
    public function showAction(Classmanagement $c): Response
    {
        return $this->render('detail.html.twig', [
            'c'=>$c
        ]);
    }
     /**
     * @Route("/add", name="class_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    
    {
        
        $c = new Classmanagement();
        $form = $this->createForm(ClassType::class, $c);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->repo->save($c,true);
            return $this->redirectToRoute('class_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("class/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="class_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Classmanagement $c,
    SluggerInterface $slugger): Response
    {
        
        $form = $this->createForm(ClasstType::class, $c);   

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            // if($s->getCreated()===null){
            //     $s->setCreated(new \DateTime());
            // }
            // $imgFile = $form->get('file')->getData();
            // if ($imgFile) {
            //     $newFilename = $this->uploadImage($imgFile,$slugger);
            //     $s->setImage($newFilename);
            // }
            // $this->repo->save($s,true);
            return $this->redirectToRoute('class_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("class/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
     /**
     * @Route("/delete/{id}",name="class_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Classmanagement $c): Response
     {
         $this->repo->remove($c,true);
         return $this->redirectToRoute('class_show', [], Response::HTTP_SEE_OTHER);
     }
}

<?php

namespace App\Controller;

use App\Entity\Study;
use App\Repository\StudyRepository;
use StudyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class StudyController extends AbstractController
/**
 * @Route("/study")
 */
{
    private StudyRepository $repo;
    public function __construct(StudyRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="study_show")
     */
    public function readAllAction(): Response
    {
        $study = $this->repo->findAll();
        return $this->render('study/index.html.twig', [
            'study'=>$study
        ]);
    }
     /**
     * @Route("/{id}", name="study_read",requirements={"id"="\d+"})
     */
    public function showAction(Study $stu): Response
    {
        return $this->render('detail.html.twig', [
            'stu'=>$stu
        ]);
    }
     /**
     * @Route("/add", name="study_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    
    {
        
        $stu = new Study();
        $form = $this->createForm(StudyType::class, $stu);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->repo->save($stu,true);
            return $this->redirectToRoute('study_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("study/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="study_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Study $stu,
    SluggerInterface $slugger): Response
    {
        
        $form = $this->createForm(StudyType::class, $stu);   

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
            return $this->redirectToRoute('study_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("study/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
     /**
     * @Route("/delete/{id}",name="study_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Study $stu): Response
     {
         $this->repo->remove($stu,true);
         return $this->redirectToRoute('study_show', [], Response::HTTP_SEE_OTHER);
     }
 
}

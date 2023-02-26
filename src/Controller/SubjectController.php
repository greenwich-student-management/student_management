<?php

namespace App\Controller;

use App\Entity\Subjectmanagement;
use App\Repository\SubjectmanagementRepository;
use SubjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


/**
 * @Route("/Subject")
 */
class SubjectController extends AbstractController
{
  private SubjectmanagementRepository $repo;
  public function __construct(SubjectmanagementRepository $repo)
 {
    $this->repo = $repo;
 }
 /**
  * @Route("/", name="subject_show")
  */
 public function subjectShowAction(): Response
 {
      $subject= $this->repo->findAll();
     return $this->render('subject/index.html.twig', [
      'Subject'=>$subject
  ]);
 }
 /**
   * @Route("/{id}", name="major_read",requirements={"id"="\d+"})
   */
  public function showAction(Subjectmanagement $s): Response
  {
      return $this->render('detail.html.twig', [
          'm'=>$s
      ]);
  }
  /**
   * @Route("/add", name="subject_create")
   */
  public function createAction(Request $req, SluggerInterface $slugger): Response
  {
      
      $s = new Subjectmanagement();
      $form = $this->createForm(SubjectType::class, $s);

      $form->handleRequest($req);
      if($form->isSubmitted() && $form->isValid())
      {
          // if($s->getCreated()===null){
          //     $s->setCreated(new \DateTime());
          // }
          // $imgFile = $form->get('file')->getData();
          // if ($imgFile) {
          //     $newFilename = $this->uploadImage($imgFile,$slugger);
          //     $s->setImage($newFilename);
          // }
          $this->repo->save($s,true);
          return $this->redirectToRoute('subject_show', [], Response::HTTP_SEE_OTHER);
      }
      return $this->render("subject/form.html.twig",[
          'form' => $form->createView()
      ]);
  }
  /**
   * @Route("/edit/{id}", name="subject_edit",requirements={"id"="\d+"})
   */
  public function majorEditAction(Request $req, Subjectmanagement $s,
  SluggerInterface $slugger): Response
  {
      
      $form = $this->createForm(SubjectType::class, $s);   

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
          $this->repo->save($s,true);
          return $this->redirectToRoute('subject_show', [], Response::HTTP_SEE_OTHER);
      }
      return $this->render("subject/form.html.twig",[
          'form' => $form->createView()
      ]);
  }
  /**
   * @Route("/delete/{id}",name="subject_delete",requirements={"id"="\d+"})
   */
  
   public function deleteAction(Request $request, Subjectmanagement $s): Response
   {
       $this->repo->remove($s,true);
       return $this->redirectToRoute('major_show', [], Response::HTTP_SEE_OTHER);
   }
  
}

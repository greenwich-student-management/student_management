<?php

namespace App\Controller;

use App\Entity\Major;
use App\Repository\MajorRepository;
use MajorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


/**
 * @Route("/Major")
 */
class MajorController extends AbstractController
{
    private MajorRepository $repo;
    public function __construct(MajorRepository $repo)
   {
      $this->repo = $repo;
   }
   /**
    * @Route("/", name="major_show")
    */
   public function majorShowAction(): Response
   {
        $Major= $this->repo->findAll();
       return $this->render('major/index.html.twig', [
        'Majors'=>$Major
    ]);
   }
   /**
     * @Route("/{id}", name="major_read",requirements={"id"="\d+"})
     */
    public function showAction(Major $m): Response
    {
        return $this->render('detail.html.twig', [
            'm'=>$m
        ]);
    }
    /**
     * @Route("/add", name="major_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $s = new Major();
        $form = $this->createForm(MajorType::class, $s);

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
            return $this->redirectToRoute('major_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("major/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/edit/{id}", name="major_edit",requirements={"id"="\d+"})
     */
    public function majorEditAction(Request $req, Major $m,
    SluggerInterface $slugger): Response
    {
        
        $form = $this->createForm(MajorType::class, $m);   

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
            $this->repo->save($m,true);
            return $this->redirectToRoute('major_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("major/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/delete/{id}",name="major_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Major $m): Response
     {
         $this->repo->remove($m,true);
         return $this->redirectToRoute('major_show', [], Response::HTTP_SEE_OTHER);
     }

}

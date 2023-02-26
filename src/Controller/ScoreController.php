<?php

namespace App\Controller;

use App\Entity\Score;
use App\Repository\ScoreRepository;
use ScoreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ScoreController extends AbstractController
/**
 * @Route("/score")
 */
{
    private ScoreRepository $repo;
    public function __construct(ScoreRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="score_show")
     */
    public function readAllAction(): Response
    {
        $score = $this->repo->findAll();
        return $this->render('score/index.html.twig', [
            'score'=>$score
        ]);
    }
     /**
     * @Route("/{id}", name="score_read",requirements={"id"="\d+"})
     */
    public function showAction(Score $sc): Response
    {
        return $this->render('detail.html.twig', [
            's'=>$sc
        ]);
    }
     /**
     * @Route("/add", name="score_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    
    {
        
        $sc = new Score();
        $form = $this->createForm(ScoreType::class, $sc);

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
            $this->repo->save($sc,true);
            return $this->redirectToRoute('score_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("score/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="score_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Score $sc,
    SluggerInterface $slugger): Response
    {
        
        $form = $this->createForm(ScoreType::class, $sc);   

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
            $this->repo->save($sc,true);
            return $this->redirectToRoute('score_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("score/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
/**
     * @Route("/delete/{id}",name="score_delete",requirements={"id"="\d+"})
     */
    
     public function deleteAction(Request $request, Score $sc): Response
     {
         $this->repo->remove($sc,true);
         return $this->redirectToRoute('score_show', [], Response::HTTP_SEE_OTHER);
     }
    
}

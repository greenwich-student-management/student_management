<?php

namespace App\Controller;

use App\Entity\Studentmanagement;
use App\Repository\StudentmanagementRepository;
use StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class StudentController extends AbstractController

/**
 * @Route("/student1")
 */
{
    private StudentmanagementRepository $repo;
    public function __construct(StudentmanagementRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="student_show")
     */
    public function readAllAction(): Response
    {
        $students = $this->repo->findAll();
        return $this->render('student/index.html.twig', [
            'student'=>$students
        ]);
    }

     /**
     * @Route("/{id}", name="student_read",requirements={"id"="\d+"})
     */
    public function showAction(Studentmanagement $s): Response
    {
        return $this->render('detail.html.twig', [
            's'=>$s
        ]);
    }

     /**
     * @Route("/add", name="student_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    
    {
        
        $s = new Studentmanagement();
        $form = $this->createForm(StudentType::class, $s);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            // if($s->getCreated()===null){
            //     $s->setCreated(new \DateTime());
            // }
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $s->setImage($newFilename);
            }
            $this->repo->save($s,true);
            return $this->redirectToRoute('student_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("student/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="student_edit",requirements={"id"="\d+"})
     */
    public function editAction(Request $req, Studentmanagement $s,
    SluggerInterface $slugger): Response
    {
        
        $form = $this->createForm(StudentType::class, $s);   

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            // if($s->getCreated()===null){
            //     $s->setCreated(new \DateTime());
            // }
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $s->setImage($newFilename);
            }
            $this->repo->save($s,true);
            return $this->redirectToRoute('student_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("student/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    public function uploadImage($imgFile, SluggerInterface $slugger): ?string{
        $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
        try {
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFilename
            );
        } catch (FileException $e) {
            echo $e;
        }
        return $newFilename;
    }

    /**
     * @Route("/delete/{id}",name="student_delete",requirements={"id"="\d+"})
     */
    
    public function deleteAction(Request $request, Studentmanagement $s): Response
    {
        $this->repo->remove($s,true);
        return $this->redirectToRoute('student_show', [], Response::HTTP_SEE_OTHER);
    }

}






<?php

namespace App\Controller;

use App\Entity\Candidato;
use App\Form\CandidatoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CandidatoController extends AbstractController
{
    /**
     * @Route("/candidato", name="candidato")
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        $candidato = new Candidato();

        $form = $this->createForm(CandidatoType::class, $candidato);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $file = $candidato->getFoto();
            echo "<pre>";
            var_dump($file);
            die();

            #$filename = $file->getClientOriginalName();


            try {
                $file->move($this->getParameter("kernel.project_dir")."/public/uploads/foto", $filename
                );
            } catch (FileException $e) {

            }
            $file->setFoto($file);
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidato);
            $em->flush();

            return $this->redirectToRoute('candidato');

        }

        return $this->render('candidato/index.html.twig',  [
            'form' => $form->createView()
        ]);
    }

    private function generateUniqueFilename()
    {
        return md5(uniqid());
    }
}

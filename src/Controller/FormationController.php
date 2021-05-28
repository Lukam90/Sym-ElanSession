<?php

namespace App\Controller;

use App\Entity\Session;
use App\Entity\Formation;
use App\Form\FormationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/formations")
 * @IsGranted("ROLE_USER")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/add", name="formation_add")
     * @Route("/{id}/edit", name="formation_edit")
     */
    public function addFormation(Formation $formation = null, Request $request, EntityManagerInterface $manager) {
        // Si l'objet Formation n'existe pas, on instancie un nouveau

        if (! $formation) {
            $formation = new Formation();
        }

        // On créé la classe FormationType au préalable

        $form = $this->createForm(FormationType::class, $formation, ["attr" => ["class" => "w3-container"]]);
        $form->handleRequest($request);

        // On soumet le formulaire une fois valide

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les données du formulaire

            $formation = $form->getData();

            // On ajoute un (joli) message flash

            if ($formation->getId() !== null)
                $this->addFlash("success", "Formation modifiée avec succès.");
            else
                $this->addFlash("success", "Formation créée avec succès.");

            // On ajoute la nouvelle formation

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

            // On redirige vers la liste des formations

            return $this->redirectToRoute("index");
        }

        // On affiche la vue avec des paramètres

        return $this->render("formation/formation_form.html.twig", [
            "formFormation" => $form->createView(),
            "editMode"    => $formation->getId() !== null
        ]);
    }

    /**
     * @Route("/delete/{id}", name="formation_delete")
     * @param Formation $formation
     * @return Response
     */ 

    public function remove(Formation $formation) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($formation);
        $em->flush();

        $this->addFlash("success", "Le formation $formation a été supprimé.");

        return $this->redirect($this->generateUrl("index"));
    }
}
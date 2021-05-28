<?php

namespace App\Controller;

use App\Entity\Stagiaire;
use App\Form\StagiaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/stagiaires")
 * @IsGranted("ROLE_USER")
 */
class StagiaireController extends AbstractController
{
    /**
     * @Route("/sort", name="stagiaires_sort")
     */
    public function sort(Request $request): Response
    {
        $criteria = $request->query->get("criteria");

        $stagiaires = $this->getDoctrine()
                         ->getRepository(Stagiaire::class)
                         ->findBy([], [$criteria => "ASC"]);

        return $this->render('stagiaire/stagiaires.html.twig', [
            'stagiaires' => $stagiaires,
        ]);
    }

    /**
     * @Route("/add", name="stagiaire_add")
     * @Route("/{id}/edit", name="stagiaire_edit")
     */
    public function addStagiaire(Stagiaire $stagiaire = null, Request $request, EntityManagerInterface $manager) {
        // Si le Stagiaire n'existe pas, on instancie un nouveau

        if (! $stagiaire) {
            $stagiaire = new Stagiaire();
        }

        // On créé la classe StagiaireType au préalable

        $form = $this->createForm(StagiaireType::class, $stagiaire, ["attr" => ["class" => "w3-container"]]);
        $form->handleRequest($request);

        // On soumet le formulaire une fois valide

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les données du formulaire

            $stagiaire = $form->getData();

            // On ajoute un (joli) message flash

            if ($stagiaire->getId() !== null)
                $this->addFlash("success", "Stagiaire modifié avec succès.");
            else
                $this->addFlash("success", "Stagiaire créé avec succès.");

            // On ajoute le nouveau stagiaire

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stagiaire);
            $entityManager->flush();

            // On redirige vers la liste des stagiaires

            return $this->redirectToRoute("stagiaires_index");
        }

        // On affiche la vue avec des paramètres

        return $this->render("stagiaire/stagiaire_form.html.twig", [
            "formStagiaire" => $form->createView(),
            "editMode"    => $stagiaire->getId() !== null
        ]);
    }

    /**
     * @Route("/", name="stagiaires_index")
     */
    public function index(): Response
    {
        $stagiaires = $this->getDoctrine()
                         ->getRepository(Stagiaire::class)
                         ->findBy([], ["id" => "ASC"]);

        return $this->render('stagiaire/stagiaires.html.twig', [
            'stagiaires' => $stagiaires,
        ]);
    }

    /**
     * @Route("/{id}", name="stagiaire_show", methods="GET")
     */
    public function show(Stagiaire $stagiaire): Response {
        return $this->render("stagiaire/stagiaire_show.html.twig", [
            "stagiaire" => $stagiaire
        ]);
    }

    /**
     * @Route("/delete/{id}", name="stagiaire_delete")
     * @param Stagiaire $stagiaire
     * @return Response
     */ 

    public function remove(Stagiaire $stagiaire) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($stagiaire);
        $em->flush();

        $this->addFlash("success", "Le stagiaire $stagiaire a été supprimé.");

        return $this->redirect($this->generateUrl("stagiaires_index"));
    }
}
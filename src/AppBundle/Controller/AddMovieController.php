<?php
/**
 * Created by PhpStorm.
 * User: christianbrill
 * Date: 03/09/2017
 * Time: 10:03
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddMovieController extends Controller
{
    /**
     * @Route ("/addmovie", name="addmovie")
     */
    public function newAction(Request $request)
    {
        $movie = new Movie();

        $form = $this->createFormBuilder($movie)
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('trailer', TextType::class)
            ->add('length', IntegerType::class)
            ->add('released', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Add Movie'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $movie = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return $this->redirectToRoute('movielist');
        }

        return $this->render('movies/add-movie.html.twig', array(
            'page_title' => 'Add a Movie',
            'form' => $form->createView(),
        ));
    }
}
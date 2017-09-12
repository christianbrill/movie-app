<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ShowMoviesController extends Controller
{
    /**
     * @Route ("/movielist", name="movielist")
     */
    public function showMovieAction(Request $request)
    {
        $movies = $this->getDoctrine()->getManager()->getRepository('AppBundle:Movie')->findAll();

        return $this->render('movies/show-movies.html.twig', array(
            'page_title' => 'Movie List',
            'movies' => $movies
        ));
    }
}
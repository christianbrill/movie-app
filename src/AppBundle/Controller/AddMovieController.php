<?php
/**
 * Created by PhpStorm.
 * User: christianbrill
 * Date: 03/09/2017
 * Time: 10:03
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AddMovieController extends Controller
{
    /**
     * @Route ("/addmovie", name="addmovie")
     */
    public function addMovieAction(Request $request)
    {
        return $this->render('movies/add-movie.html.twig', array('page_title' => 'Add a Movie'));
    }
}
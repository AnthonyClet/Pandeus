<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NoUserController extends AbstractController
{

    /**
     * @Route("/home", name="home_page")
     */
    public function homePage()
    {
        return $this->render('home_page.html.twig');
    }

}
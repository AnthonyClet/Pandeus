<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UsersRepository;

class UserController extends AbstractController
{

    /**
     * @Route("/", name="home_page")
     */
    public function homePage()
    {
        return $this->render('home_page.html.twig');
    }

    /**
     * @Route("/events", name="events_page")
     */
    public function eventsPage()
    {
        return $this->render('events.html.twig');
    }

    /**
     * @Route("/line_up", name="line_up_page")
     */
    public function lineUpPage(UsersRepository $usersRepository)
    {
        $lineUp = $usersRepository->findAll();

        return $this->render('line_up.html.twig', [
            'line_up' => $lineUp
        ]);
    }

    /**
     * @Route("/help", name="help_page")
     */
    public function helpPage()
    {
        return $this->render('help.html.twig');
    }

}
<?php


namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Admins;
use App\Repository\AdminsRepository;

class AdminController extends AbstractController
{

    // Route pour ma home page. //

    /**
     * @Route("/admin/", name="admin_home_page")
     */
    public function homePage()
    {
        return $this->redirectToRoute('home_page');
    }

    // Route pour ma liste d'admins. //

    /**
     * @Route("/admin/list_admins", name="list_admins")
     */
    public function listAdmins(AdminsRepository $adminsRepository)
    {

        $admins = $adminsRepository->findAll();

        return $this->render('/Admins/list_admins.html.twig', [
            'admins' => $admins
        ]);

    }

    // Route pour ajouter un admin. //

    /**
     * @Route("/admin/list_admins/add", name="add_admin")
     */
    public function addAdmin(Request $request, EntityManagerInterface $entityManager)
    {
        $admin = new Admins();
        $adminForm = $this->createForm(AdminType::class, $admin);

        $adminForm->handleRequest($request);

        if($adminForm->isSubmitted() && $adminForm->isValid()) {

            $admin = $adminForm->getData();

            $entityManager->persist($admin);
            $entityManager->flush();

            $this->addFlash("success","L'admin a bien été ajouté.");
            return $this->redirectToRoute('list_admins');
        }

        return $this->render('/Admins/add_admin.html.twig', [
            'addAdminFormView' => $adminForm->createView()
        ]);

    }

    // Route pour éditer un admin. //

    /**
     * @Route("/admin/list_admins/edit/{id}", name="edit_admin")
     */
    public function editAdmin(
        $id,
        AdminsRepository $adminsRepository,
        Request $request,
        EntityManagerInterface $entityManager)
    {

        $admin = $adminsRepository->find($id);

        $adminForm = $this->createForm(AdminType::class, $admin);
        $adminForm->handleRequest($request);

        if($adminForm->isSubmitted() && $adminForm->isValid()) {

            $admin = $adminForm->getData();

            $entityManager->persist($admin);
            $entityManager->flush();

            $this->addFlash("success","La modification a bien été prise en compte.");
            return $this->redirectToRoute('list_admins');
        }

        return $this->render('/Admins/edit_admin.html.twig', [
            'adminFormView' => $adminForm->createView(),
            'admin' => $admin
        ]);

    }

    // Route pour supprimer un admin. //

    /**
     * @Route("/admin/list_admins/remove/{id}", name="remove_admin")
     */
    public function removeAdmin($id, AdminsRepository $adminsRepository, EntityManagerInterface $entityManager)
    {

        $admin = $adminsRepository->find($id);

        if (is_null($admin)) {
            throw $this->createNotFoundException('Admin non trouvé.');
        }

        $entityManager->remove($admin);
        $entityManager->flush();

        $this->addFlash('success', 'L\'admin a bien été supprimé.');

        return $this->redirectToRoute('list_admins');

    }

}
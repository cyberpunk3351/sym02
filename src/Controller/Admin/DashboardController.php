<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Menu;
use App\Entity\Post;
use App\Entity\Tag;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class DashboardController extends AbstractDashboardController



{

    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

//        return $this->redirect($routeBuilder->setController(MenuCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());

//        // you can also redirect to different pages depending on the current user
//        if ('jane' === $this->getUser()->getUsername()) {
//            return $this->redirect('...');
//        }

//        // you can also render some template to display a proper Dashboard
//        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
//        return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('D R U M M E R');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Blog'),
            yield MenuItem::linkToCrud('Post', 'fa fa-tags', Post::class),
            yield MenuItem::linkToCrud('Menu', 'fa fa-tags', Menu::class),
            yield MenuItem::linkToCrud('Category', 'fa fa-tags', Category::class),
//            yield MenuItem::linkToCrud('Tag', 'fa fa-tags', Tag::class)
        ];
    }
    
}

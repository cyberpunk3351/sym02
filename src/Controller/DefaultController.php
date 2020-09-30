<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Menu;
use App\Entity\Post;
use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController


{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {

        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->findAll();
        $menu = $em->getRepository(Menu::class)->findAll();
        $category = $em->getRepository(Category::class)->findAll();


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'post'=>$post,
            'category'=>$category,
            'menu'=>$menu

        ]);
    }

    /**
     * @Route("/post/single/{post}", name="single")
     */
    public function single(Post $post)
    {
        return $this->render('default/single.html.twig', [
            'post'=>$post

        ]);
    }

}

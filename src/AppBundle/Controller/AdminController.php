<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_home")
     */
    public function index(Request $request)
    {
        //return $this->redirect($this->generateUrl('admin_login'));
        //return $this->redirectToRoute('admin_list');
        return $this->forward('AppBundle:Admin:login');
    }

    /**
     * @Route("/login", name="admin_login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('admin/login.html.twig', [
        ]);
    }

    /**
     * @Route("/list", name="admin_list")
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('AppBundle:Post')->findAll();

        return $this->render('admin/list.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/post/{id}", name="admin_post")
     */
    public function post(Request $request, $id = null)
    {
        return $this->render('admin/post.html.twig', [
        ]);
    }
}
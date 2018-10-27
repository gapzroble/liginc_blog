<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Post;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{

    const POST_MESSAGE = 'post_message';

    /**
     * @Route("/", name="admin_home")
     * @Route("/list", name="admin_list")
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('AppBundle:Post')
            ->findBy([], ['createdAt' => 'DESC']); // load newest first

        // TODO: pagination not included

        $message = null;
        $session = $request->getSession();
        if ($session->has(static::POST_MESSAGE)) {
            $message = $session->get(static::POST_MESSAGE);
            $session->remove(static::POST_MESSAGE);
        }

        return $this->render('admin/list.html.twig', [
            'pageTitle' => 'Articles',
            'posts' => $posts,
            'message' => $message,
        ]);
    }

    /**
     * @Route("/post/new", name="admin_post_create")
     * @Route("/post/{id}", name="admin_post", requirements={"id"="\d+"})
     */
    public function post(Request $request, $id = null)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $pageTitle = null;

        if ($id > 0) {
            $pageTitle = 'Edit Arcticle';
            $post = $em->getRepository('AppBundle:Post')->find($id);
            if (!$post) {
                throw $this->createNotFoundException();
            }
        } else {
            $pageTitle = 'New Arcticle';
            $post = new Post();
        }

        $form = $this->createForm('AppBundle\Form\PostType', $post, [
            'is_edit' => $post->getId() > 0,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('image')->getData();
            if ($file) {
                $root = realpath($this->getParameter('kernel.project_dir'));
                $dir = implode(DIRECTORY_SEPARATOR, [
                    $root,
                    'web',
                    'uploads',
                ]);
                $moved = $file->move($dir, $file->getClientOriginalName());

                // set relative banner path
                $post->setBanner('uploads/' . basename($moved));
            }

            $em->persist($post);
            $em->flush();

            $request->getSession()->set(static::POST_MESSAGE, 'Article saved.');

            return $this->redirectToRoute('admin_list');
        }

        return $this->render('admin/post.html.twig', [
            'pageTitle' => $pageTitle,
            'post' => $post,
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
        ]);
    }
}

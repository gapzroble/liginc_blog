<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository\PostRepository;

class ApiController extends FOSRestController
{

    public function getPostsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $page = $request->get('page', 1);
        $pageSize = $request->get('pageSize', PostRepository::POSTS_PER_PAGE);

        $paginator = $em->getRepository('AppBundle:Post')->getPosts($page, $pageSize);

        $posts = array();
        foreach ($paginator as $post) {
            $posts[] = $post;
        }

        $totalPosts = count($paginator);
        $totalPages = ceil($totalPosts / $pageSize);

        return array(
            'posts' => $posts,
            'pagination' => [
                'current' => (int) $page,
                'totalPages' => $totalPages,
            ],
        );
    }

    public function getPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Post')->find($id);

        if (!$post) {
            return $this->createNotFoundException();
        }

        return $post;
    }
}

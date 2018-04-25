<?php

namespace App\Controller;

class DefaultController extends Controller
{
    /**
     * Default action
     */
    public function indexAction()
    {
        $data['posts'] = $this->getPosts();
        $data['popularPosts'] = $this->getPopularPosts();

        foreach ($data['posts'] as $key => $post) {
            $data['posts'][$key]->short = $this->strLimit($post->content);
        }

        foreach ($data['popularPosts'] as $key => $post) {
            $data['popularPosts'][$key]->short = $this->strLimit($post->content);
        }

        $this->view('index', $data);
    }
}

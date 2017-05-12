<?php

namespace Farah\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChatController extends Controller
{
    public function indexAction()
    {
        return $this->render("@FarahChat/Socket/chat.html.twig");
    }

    public function indexExAction()
    {
        return $this->render("@FarahChat/Socket/chatEx.html.twig");
    }

}

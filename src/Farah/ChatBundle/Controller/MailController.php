<?php

namespace Farah\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DataBundle\Entity\Mail;
use DataBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function contactAction(Request $request)
    {
        // Create the form according to the FormType created previously.
        // And give the proper parameters
        $form = $this->createForm(MailType::class,null,array(
            // To set the action use $this->generateUrl('route_identifier')
            'action' => $this->generateUrl('farah_chat_mail'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            // Refill the fields in case the form is not valid.
            $form->handleRequest($request);

            if($form->isValid()){
                // Send mail
                if($this->sendEmail($form->getData())){

                    // Everything OK, redirect to wherever you want ! :

                    return $this->redirectToRoute('farah_chat_mail');
                }else{
                    // An error ocurred, handle
                    var_dump("Errooooor :(");
                }
            }
        }

        return $this->render('FarahChatBundle:Mail:mail.html.twig', array(
            'form' => $form->createView()
        ));
    }

    private function sendEmail($data){

        $myappContactMail = 'farah.benmohamed@esprit.tn';
        $myappContactPassword = 'Farah2016';


        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
            ->setUsername($myappContactMail)
            ->setSourceIp('0.0.0.0')

            ->setPassword($myappContactPassword);


        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance("sujet de : ". $data["subject"])
            ->setFrom(array($myappContactMail => "Message by ".$data["name"]))
            ->setTo(array(
                $myappContactMail => $myappContactMail
            ))
            ->setBody("   Message: ".$data["message"]."   ContactMail :".$data["email"]);

        return $mailer->send($message);
    }



}

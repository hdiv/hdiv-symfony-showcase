<?php

namespace HDIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{

    public function orderDetailAction($orderid)
    {

        //Connection
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        //Get a order by id
        $query = "SELECT * FROM 'order' WHERE orderId='$orderid'";
        $statement = $connection->prepare($query);
        $statement->execute();
        $results = $statement->fetch();

        return $this->render('HDIVAppBundle:Default:detailOrder.html.twig', array('name' => $this->getUser()->getUsername(), 'id' => $this->getUser()->getId(), 'order' => $results));

    }


    public function orderDeleteAction($orderid)
    {

        //Connection
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        //Get a order by id
        $query = "DELETE FROM 'order' WHERE orderId='$orderid'";
        $statement = $connection->prepare($query);
        $statement->execute();
        $results = $statement->fetch();

        return $this->redirectToRoute('hdiv_app_dashboard');

    }

    public function newOrderAction(Request $request)
    {

        //Create form
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('hdiv_app_new_order'))
            ->add('idUser', 'hidden', array(
                'data' => $this->getUser()->getId(),
            ))
            ->add('newOrder', 'submit')
            ->add('company', 'text', array(
                'required' => true,
            ))
            ->add('shippingAddress', 'text', array(
                'required' => true,
            ))
            ->add('amount', 'text', array(
                'required' => true,
            ))
            ->add('email', 'text', array(
                'required' => true,
            ))
            ->add('phone', 'text', array(
                'required' => true,
            ))
            ->add('bankAccount', 'text', array(
                'required' => true,
            ))
            ->add('message', 'textarea', array(
                'required' => true,
            ))
            ->add('internationalOrder', 'choice', array(
                'choices'  => array('y' => 'Yes', 'N' => 'No'),
                'required' => true,
            ))               
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $amount = $form["amount"]->getData();
            $userId = $form["idUser"]->getData();
            $shippingAddress = $form["shippingAddress"]->getData();
            $company = $form["company"]->getData();
            $message = $form["message"]->getData();
            $phone = $form["phone"]->getData();
            $bankAccount = $form["bankAccount"]->getData();
            $email = $form["email"]->getData();

            $orderDate = new \DateTime();
            $stringOrderDate = $orderDate->format('Y-m-d H:i:s');

            //Connection
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();

            //Finds a username by id
            $query = "SELECT * FROM 'fos_user' WHERE id='$userId'";
            $statement = $connection->prepare($query);
            $statement->execute();
            $results = $statement->fetch();
            $name = $results['username'];

            //Finds a username by id
            $query = "INSERT INTO 'order' (company, shippingAddress, user, amount, message, orderDate, phone, bankAccount, email) VALUES ('$company','$shippingAddress','$name','$amount','$message', '$stringOrderDate','$phone','$bankAccount','$email')";

            $statement = $connection->prepare($query);
            $statement->execute();
            $em->flush();

            return $this->redirectToRoute('hdiv_app_dashboard');
        }


        return $this->render('HDIVAppBundle:Default:createOrder.html.twig', array('name' => $this->getUser()->getUsername(), 'id' => $this->getUser()->getId(), 'form' => $form->createView()));


    }

    public function createOrderAction()
    {


    }


}

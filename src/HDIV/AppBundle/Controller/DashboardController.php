<?php

namespace HDIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{

    public function indexAction(Request $request)
    {
        //Connection
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();

        //Gets all orders from a user
        $username = $this->getUser()->getUsername();
        $query = "SELECT * FROM 'order' WHERE user='$username'";
        $statement = $connection->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();

        //Create form
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('hdiv_app_dashboard'))
            ->add('idUser', 'hidden', array(
                'data' => $this->getUser()->getId(),
            ))
            ->add('filter', 'submit')
            ->add('filterText', 'text', array(
                'required' => false,
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $companyFilter = $form["filterText"]->getData();
            $userId = $form["idUser"]->getData();

            //Finds a username by id
            $query = "SELECT * FROM 'fos_user' WHERE id='$userId'";
            $statement = $connection->prepare($query);
            $statement->execute();
            $results = $statement->fetch();
            $name = $results['username'];

            //Finds a company that contains
            $query = "SELECT * FROM 'order' WHERE company LIKE '%$companyFilter%' AND user='$name'";
            $statement = $connection->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
        }

        return $this->render('HDIVAppBundle:Default:table.html.twig', array('name' => $this->getUser()->getUsername(), 'id' => $this->getUser()->getId(), 'results' => $results, 'form' => $form->createView()));

    }
}

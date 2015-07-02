<?php

namespace HDIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $dashboard = 'hdiv_app_dashboard';
        $loginRouteName = 'fos_user_security_login';

        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            return $this->redirect($this->generateUrl($loginRouteName));

        } else {

            return $this->redirect($this->generateUrl($dashboard));

        }
    }
}

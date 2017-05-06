<?php
/**
 * @author Tsurkanov Mihail <tsurkanovm@gmail.com>
 */
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    /**
     * @Route("/projects", name="projects_list")
     * @Method("GET")
     */
    public function indexAction()
    {
//        $projects = $this->getDoctrine()
//            ->getRepository('AppBundle:Project')
//            ->findMain();
        $projects = [];

        return $this->render('project/index.html.twig', array(
            'projects' => $projects
        ));                                                                                                                                                                                                                          
    }
}

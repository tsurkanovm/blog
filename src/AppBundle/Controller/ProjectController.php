<?php
/**
 * @author Tsurkanov Mihail <tsurkanovm@gmail.com>
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    /**
     * @Route("/project/{id}", requirements={"id"="\d+"}, name="project")
     * @ParamConverter("project", class="AppBundle:Project")
     * @Method("GET")
     *
     * @param Project $project
     * @return Response
     */
    public function showAction(Project $project)
    {
        return $this->render('project/show.html.twig', ['project' => $project]);
    }
}

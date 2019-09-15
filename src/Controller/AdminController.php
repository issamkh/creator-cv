<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 07/06/19
 * Time: 11:40
 */

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends EasyAdminController {

    /**
     * @Route("/dash/" , name="dash")
     */
    function dashAction(){

       return  $this->render("/bundles/easyAdmin/dash.html.twig");
    }

    protected function listAction()
    {

        //----redirecte if dont have permision when listing users

        if(!$this->isGranted('ROLE_SUPER_ADMIN') && $this->request->query->get('entity') =="User"){

            return $this->redirectToRoute('dash');


        }

        $this->dispatch(EasyAdminEvents::PRE_LIST);



        /***** OVERRIDE PART *****/
        $user = $this->getUser();
        if(!$this->isGranted('ROLE_SUPER_ADMIN')){
            $this->entity['list']['dql_filter'] = "entity.user = ".$user->getId();
        }
        /***** END OVERRIDE *****/



        return parent::listAction();
    }

    /**
     * @Route("/edit_profile/", name="admin_redirecte_to_edite_profile")
     */
    function showProfileEditAction() {


        $id = $this->getUser()->getId();

        return $this->redirectToRoute('easyadmin',[
            'action' => 'edit',
            'entity'=> 'User',
            'id'=> $id
        ]);

    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/06/19
 * Time: 10:48
 */

namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class frontController extends Controller {


    /**
     * @Route("/index/{name}",name="app_front_index")
     */
    public function indexAction(UserRepository $userRep,Request $request) : Response
    {

            return   $this->render('/front/index.twig',[

                    'user' => $userRep->findByUserName($request->get('name'))
            ]);
    }
} 
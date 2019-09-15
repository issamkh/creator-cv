<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 14/05/19
 * Time: 01:59
 */


# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\CategoriePortfolio;
use App\Entity\Competence;
use App\Entity\Portfolio;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use App\Entity\Experiences;
use App\Entity\Formations;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $user;
    private $security;

    public function __construct(Security $security)
    {

        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_persist' => array('setUserEntity'),
        );
    }

    public function setUserEntity(GenericEvent $event)
    {
        $entity = $event->getSubject();
        $user = $this->security->getUser();
       // || in_array("ROLE_ADMIN",$user->getRoles()) == true
        if (!($entity instanceof Experiences) && !($entity instanceof Formations)  && !($entity instanceof Portfolio)
            && !($entity instanceof Competence) && !($entity instanceof CategoriePortfolio) || in_array("ROLE_ADMIN",$user->getRoles()) ) {
            return;
        }

        // returns User object or null if not authenticated

        $entity->setUser($user);

        $event['entity'] = $entity;
    }
}

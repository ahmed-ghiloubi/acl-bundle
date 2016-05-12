<?php

namespace ProjectA\Bundle\AclBundle\Twig\Extension;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use ProjectA\Bundle\AclBundle\Security\Acl\Domain\ObjectIdentityRetrievalStrategy;

/**
 * Description of SecurityExtension
 *
 * @author massilkorichi
 */
class SecurityExtension extends \Twig_Extension
{
    public function getClassIdentity($class)
    {
        $objectIdentity = new ObjectIdentityRetrievalStrategy();
        $classIdentity = $objectIdentity->getObjectIdentity($class);
        
        return $classIdentity;
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('class_identity', array($this, 'getClassIdentity')),
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'msi.security';
    }
}

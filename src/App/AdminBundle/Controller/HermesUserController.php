<?php

namespace App\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\AdminBundle\Entity\HermesUser;
use App\AdminBundle\Form\HermesUserType;

/**
 * HermesUser controller.
 *
 * @Route("/hermesuser")
 */
class HermesUserController extends Controller
{

    /**
     * Lists all HermesUser entities.
     *
     * @Route("/", name="users_hermes_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppAdminBundle:HermesUser')->findAll();
        
//        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entities' => $entities,
//            'delete_form' => $deleteForm->createView()
        );
    }
    
    /**
     * Creates a new HermesUser entity.
     *
     * @Route("/", name="hermesuser_create")
     * @Method("POST")
     * @Template("AppAdminBundle:HermesUser:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new HermesUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hermesuser_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a HermesUser entity.
     *
     * @param HermesUser $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(HermesUser $entity)
    {
        $form = $this->createForm(new HermesUserType(), $entity, array(
            'action' => $this->generateUrl('hermesuser_create'),
            'method' => 'POST',
        ));

         $form->add('submit', 'submit', array(
            'label' => 'Creer',
            'attr' => array(
                'class' => 'btn btn-danger'
            ), 
        ));

        return $form;
    }

    /**
     * Displays a form to create a new HermesUser entity.
     *
     * @Route("/new", name="hermesuser_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new HermesUser();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a HermesUser entity.
     *
     * @Route("/{id}", name="hermesuser_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppAdminBundle:HermesUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HermesUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing HermesUser entity.
     *
     * @Route("/{id}/edit", name="hermesuser_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppAdminBundle:HermesUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HermesUser entity.');
        }

        $editForm   = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a HermesUser entity.
    *
    * @param HermesUser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(HermesUser $entity)
    {
        $form = $this->createForm(new HermesUserType(), $entity, array(
            'action' => $this->generateUrl('hermesuser_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

         $form->add('submit', 'submit', array(
            'label' => 'Modifier',
            'attr' => array(
                'class' => 'btn btn-danger'
            ), 
        ));

        return $form;
    }
    /**
     * Edits an existing HermesUser entity.
     *
     * @Route("/{id}", name="hermesuser_update")
     * @Method("PUT")
     * @Template("AppAdminBundle:HermesUser:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppAdminBundle:HermesUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HermesUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('users_hermes_list', array('id' => $id)));
        }
        
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a HermesUser entity.
     *
     * @Route("/{id}", name="hermesuser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppAdminBundle:HermesUser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find HermesUser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('users_hermes_list'));
    }

    /**
     * Creates a form to delete a HermesUser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hermesuser_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

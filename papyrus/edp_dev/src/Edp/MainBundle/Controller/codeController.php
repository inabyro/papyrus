<?php

namespace Edp\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edp\MainBundle\Entity\code;
use Edp\MainBundle\Form\codeType;

/**
 * code controller.
 *
 */
class codeController extends Controller
{

    /**
     * Lists all code entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EdpMainBundle:code')->findAll();

        return $this->render('EdpMainBundle:code:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new code entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new code();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_codes_show', array('id' => $entity->getId())));
        }

        return $this->render('EdpMainBundle:code:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a code entity.
     *
     * @param code $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(code $entity)
    {
        $form = $this->createForm(new codeType(), $entity, array(
            'action' => $this->generateUrl('admin_codes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new code entity.
     *
     */
    public function newAction()
    {
        $entity = new code();
        $form   = $this->createCreateForm($entity);

        return $this->render('EdpMainBundle:code:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a code entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:code')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find code entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EdpMainBundle:code:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing code entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:code')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find code entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EdpMainBundle:code:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a code entity.
    *
    * @param code $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(code $entity)
    {
        $form = $this->createForm(new codeType(), $entity, array(
            'action' => $this->generateUrl('admin_codes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing code entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:code')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find code entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_codes'));
//            return $this->redirect($this->generateUrl('admin_codes_edit', array('id' => $id)));
        }

        return $this->render('EdpMainBundle:code:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a code entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EdpMainBundle:code')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find code entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_codes'));
    }

    /**
     * Creates a form to delete a code entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_codes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}

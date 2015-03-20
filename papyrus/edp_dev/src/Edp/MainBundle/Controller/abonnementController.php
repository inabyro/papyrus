<?php

namespace Edp\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edp\MainBundle\Entity\abonnement;
use Edp\MainBundle\Form\abonnementType;

/**
 * abonnement controller.
 *
 */
class abonnementController extends Controller
{

    /**
     * Lists all abonnement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EdpMainBundle:abonnement')->findAll();

        return $this->render('EdpMainBundle:abonnement:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new abonnement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new abonnement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_abonnements_show', array('id' => $entity->getId())));
        }

        return $this->render('EdpMainBundle:abonnement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a abonnement entity.
     *
     * @param abonnement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(abonnement $entity)
    {
        $form = $this->createForm(new abonnementType(), $entity, array(
            'action' => $this->generateUrl('admin_abonnements_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new abonnement entity.
     *
     */
    public function newAction()
    {
        $entity = new abonnement();
        $form   = $this->createCreateForm($entity);

        return $this->render('EdpMainBundle:abonnement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a abonnement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:abonnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find abonnement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EdpMainBundle:abonnement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing abonnement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:abonnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find abonnement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EdpMainBundle:abonnement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a abonnement entity.
    *
    * @param abonnement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(abonnement $entity)
    {
        $form = $this->createForm(new abonnementType(), $entity, array(
            'action' => $this->generateUrl('admin_abonnements_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing abonnement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:abonnement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find abonnement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_abonnements'));
//            return $this->redirect($this->generateUrl('admin_abonnements_edit', array('id' => $id)));
        }

        return $this->render('EdpMainBundle:abonnement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a abonnement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EdpMainBundle:abonnement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find abonnement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_abonnements'));
    }

    /**
     * Creates a form to delete a abonnement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_abonnements_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}

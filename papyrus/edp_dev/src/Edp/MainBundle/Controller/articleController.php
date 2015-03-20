<?php

namespace Edp\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Edp\MainBundle\Entity\article;
use Edp\MainBundle\Form\articleType;

/**
 * article controller.
 *
 */
class articleController extends Controller
{

    /**
     * Lists all article entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EdpMainBundle:article')->findAll();

        return $this->render('EdpMainBundle:article:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new article entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new article();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_article_show', array('id' => $entity->getId())));
        }

        return $this->render('EdpMainBundle:article:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a article entity.
     *
     * @param article $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(article $entity)
    {
        $form = $this->createForm(new articleType(), $entity, array(
            'action' => $this->generateUrl('admin_article_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new article entity.
     *
     */
    public function newAction()
    {
        $entity = new article();
        $form   = $this->createCreateForm($entity);

        return $this->render('EdpMainBundle:article:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find article entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EdpMainBundle:article:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find article entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EdpMainBundle:article:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a article entity.
    *
    * @param article $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(article $entity)
    {
        $form = $this->createForm(new articleType(), $entity, array(
            'action' => $this->generateUrl('admin_article_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing article entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EdpMainBundle:article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find article entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_article'));
//            return $this->redirect($this->generateUrl('admin_article_edit', array('id' => $id)));
        }

        return $this->render('EdpMainBundle:article:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a article entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EdpMainBundle:article')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find article entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_article'));
    }

    /**
     * Creates a form to delete a article entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_article_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}

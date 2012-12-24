<?php

namespace racine\GestionTestsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use racine\GestionTestsBundle\Entity\Test;
use racine\GestionTestsBundle\Form\TestType;

/**
 * Test controller.
 *
 * @Route("/Test")
 */
class TestController extends Controller
{
    /**
     * Lists all Test entities.
     *
     * @Route("/", name="Test")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('racineGestionTestsBundle:Test')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Test entity.
     *
     * @Route("/{id}/show", name="Test_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('racineGestionTestsBundle:Test')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Test entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Test entity.
     *
     * @Route("/new", name="Test_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Test();
        $form   = $this->createForm(new TestType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Test entity.
     *
     * @Route("/GT/create", name="Test_create")
     * @Method("POST")
     * @Template("racineGestionTestsBundle:Test:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Test();
        $form = $this->createForm(new TestType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Test_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Test entity.
     *
     * @Route("/{id}/edit", name="Test_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('racineGestionTestsBundle:Test')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Test entity.');
        }

        $editForm = $this->createForm(new TestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Test entity.
     *
     * @Route("/{id}/update", name="Test_update")
     * @Method("POST")
     * @Template("racineGestionTestsBundle:Test:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('racineGestionTestsBundle:Test')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Test entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TestType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Test_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Test entity.
     *
     * @Route("/{id}/delete", name="Test_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('racineGestionTestsBundle:Test')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Test entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Test'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

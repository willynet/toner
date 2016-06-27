<?php

namespace TonerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TonerBundle:Default:index.html.twig' );
    }
    
    public function contactoAction()
    {
        return $this->render('TonerBundle:Default:contacto.html.twig',array('envio' => 'false') );
    }
    public function nosotrosAction()
    {
        return $this->render('TonerBundle:Default:nosotros.html.twig');
    }
    public function privacidadAction()
    {
        return $this->render('TonerBundle:Default:privacidad.html.twig');
    }
    public function terminosAction()
    {
        return $this->render('TonerBundle:Default:terminos.html.twig');
    }
    
     public function marcaAction($id, $page)
    {
         $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TonerBundle:Marca')->find($id);
        $productos = $entities->getProductos();
        return $this->render('TonerBundle:Default:categoria.html.twig', array(
            'entities' => $productos, 'marca' => $entities ,
        ));
        
    }
    
    public function productoAction($id)
    {
         $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TonerBundle:Producto')->find($id);
        
        return $this->render('TonerBundle:Default:detalle.html.twig', array(
            'producto' => $entities ,
        ));
        
    }
    
    public function homeAction()
    {
        return $this->render('TonerBundle:Default:admin.html.twig');
    }
    
    
     public function buscarAction(Request $request)
    {
         $busqueda= $request->request->get('busqueda', '-1');
       
        $em = $this->getDoctrine()->getManager();
        $consulta = $em->createQuery(
                'SELECT p FROM TonerBundle:Producto p WHERE
                p.nombre LIKE :busqueda'
                );
        $consulta->setParameter('busqueda', "%".$busqueda ."%");

        $consulta->setMaxResults(12);
        $entities = $consulta->getResult();

        
        return $this->render('TonerBundle:Default:resultado.html.twig', array(
            'entities' => $entities ,
        ));
        
    }
    
     public function enviarmensajeAction(Request $request)
    {
        $nombre= $request->request->get('nombre', 'vacio');
        $apellido= $request->request->get('apellido', 'vacio');
        $email= $request->request->get('email', 'vacio');
        $mensaje= $request->request->get('mensaje', 'vacio');

        
        $message = \Swift_Message::newInstance()
        ->setSubject('Contacto desde la pagina Web')
        ->setFrom('ventas@toner-economico.com')
        ->setTo('williamdavidmesa@gmail.com')
        ->setBody('Contacto desde la pagina Web de:'."\n".
                "Nombre: ".$nombre ."\n".
                "Apellido: ". $apellido ."\n".
                "Email: ". $email ."\n".
                "Mensaje: ".$mensaje ."\n");
        $this->get('mailer')->send($message);
        
        return $this->render('TonerBundle:Default:contacto.html.twig', array('envio' => 'true'));
        
    }
    
    public function enviarcompraAction(Request $request)
    {
        $nombre= $request->request->get('nombre', 'vacio');
        $apellido= $request->request->get('apellido', 'vacio');
        $email= $request->request->get('email', 'vacio');
        $telefono= $request->request->get('telefono', 'vacio');
        $direccion= $request->request->get('direccion', 'vacio');
        $mensaje= $request->request->get('mensaje', 'vacio');

        
        $message = \Swift_Message::newInstance()
        ->setSubject('Peticion de COMPRA desde la pagina Web')
        ->setFrom('ventas@toner-economico.com')
        ->setTo('williamdavidmesa@gmail.com')
        ->setBody('Contacto desde la pagina Web de:'."\n".
                "Nombre: ".$nombre ."\n".
                "Apellido: ". $apellido ."\n".
                "Email: ". $email ."\n".
                "Telefono: ". $telefono ."\n".
                "Direccion: ". $direccion ."\n".
                "Mensaje: ".$mensaje ."\n");
        $this->get('mailer')->send($message);
        
        return $this->render('TonerBundle:Default:compra.html.twig', array('producto' => '' , 'envio' => 'true'));
        
    }
    
    
     public function compraAction($producto)
    {
        return $this->render('TonerBundle:Default:compra.html.twig', array(
            'producto' => $producto, 'envio' => 'false'
        ));
    }
    
     public function hpAction()
    {
        return $this->render('TonerBundle:Default:hp.html.twig');
    }
    
     public function samsungAction()
    {
        return $this->render('TonerBundle:Default:samsung.html.twig');
    }
}

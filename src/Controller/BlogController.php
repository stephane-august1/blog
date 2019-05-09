<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="index")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'owner' => 'Stephane',
        ]);
    }
    /**
     * @Route("/blog/show/{variable}",defaults={"variable"="Article Sans Titre"},
     * requirements={"variable"="[a-z0-9-]+"},name="show")
     */
    public function show($variable)
    {
        $variable = ucwords($variable, "-");
        $var = str_replace("-"," ",$variable);
        return $this->render('blog/show.html.twig', [
            'slug' => $var ,
            
        ]);
    }
}

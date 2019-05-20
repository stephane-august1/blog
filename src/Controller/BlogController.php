<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;

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
        $var = str_replace("-", " ", $variable);

        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article=$repo->findBy(array(), array('id' => 'DESC'), 3);
       
        return $this->render('blog/show.html.twig', [
            'slug' => $var ,
            'article' => $article,
            

            
            
        ]);
    }

    /**
         * @Route("/article", name="article")
         */
    public function article()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);//creer une var repo lire article avec doctrine
        $articles = $repo->findAll();  //trouve tt les articles

        return $this->render('blog/article.html.twig', [
           
            'articles' => $articles   //lier article au twig
        ]);
    }



    /**
    * @Route("/category/{categoryName}",name="category")
    */
    
    public function showByCategory($categoryName)
    {
      
        $cat = $this->getDoctrine()->getRepository(Category::class)->findOneby(['title'=> $categoryName]);
        $articles = $this->getDoctrine()->getRepository(Article::class)->findBy(array('category' => $cat), array('id' => 'DESC'), 3);
        
       
        return $this->render('blog/category.html.twig', [
            'category' => $categoryName ,
            'article' => $articles,
        ]);
    }
}

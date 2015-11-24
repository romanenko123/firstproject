<?php
namespace Rim\NestleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Rim\NestleBundle\Entity\Priz;
use Symfony\Component\DomCrawler\Crawler;

class PrizController extends Controller
{

    /**
     * @Route("/water")
     */
    public function waterAction()
    {
        return new Response('water');
    }
    
    /**
     * @Route("/priz")
     * @Template()
     */
    public function indexAction()
    {
        for ($i = 0; $i < 10; $i ++) {
            
            $em = $this->getDoctrine()->getManager();
            $entity = new Priz();
            
            $entity->setStarttime($this->getUTime());
            $html = file_get_contents("http://www.nestlebarspromo.com.ua");
            
            $entity->setNestheaders(implode('|', $http_response_header));
            
            
            $entity->setSendtime($this->getUTime());
            $crawler = new Crawler($html);
            $message = $crawler->filter('html body div#wrapper div#content.fit-screen div.container div.row.prize div.counter div.numbers')->text();
            $entity->setValpriz($i.'-'.$message);
            $entity->setEndtime($this->getUTime());
            
            $em->persist($entity);
            $em->flush();
        }
        
        return new Response('777');
    }
    
    private function getUTime()
    {
        $microtime = microtime();
        $rest = substr($microtime, 2, 3);
        $time = time();
        return $time . $rest;
    }
}

<?php
namespace Rim\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rim\PlayerBundle\Entity\Link;
use Symfony\Component\DomCrawler\Crawler;
use Rim\PlayerBundle\Entity\Target;
use Rim\PlayerBundle\Entity\Status;

class TargetController extends Controller
{

    /**
     * @Route("/process", name = "process")
     * @Template()
     */
    public function processAction()
    {
        $em = $this->getDoctrine()->getManager();
        $link = $em->getRepository('RimPlayerBundle:Link')->findOneMaxPriority();
        $status = new Status();
        $status = $em->getRepository('RimPlayerBundle:Status')->findOneMaxIdEntity();
        $pagination = '?kk=' . $status->getMultiplicity() * 20;
        
        $html = file_get_contents($link . $pagination);
        
        $crawler = new Crawler($html);
        $crawler = $crawler->filter('.col-md-8.text-left.col-xm-12');
        $crawler_count = $crawler->count();
        $crawler->each(function (Crawler $node, $i) {
            $node_link = $node->filter('a')
                ->link()
                ->getUri();
            $node_html = file_get_contents($node_link);
            $node_crawler = new Crawler($node_html);
            $node_count = $node_crawler->filter('.glyphicon.glyphicon-headphones')
                ->count();
            
            $entity = new Target();
            $entity->setName($node_link);
            $entity->setContent($node_html);
            $entity->setTarget($node_count);
            
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($entity);
            $em->flush();
            if ($node_count > 1 && $node_link != $this->getParameter('needs_url').'index/oholoshenya/viddam-darom/12823.html') {
                die($node_link);
            }
            
        });
        
        if ($crawler_count < 20) {
            $status->setMultiplicity(0);
            $em->flush();
            
            return $this->redirect($this->generateUrl('player_priority', array(
                'priority' => 12
            )));
        } else {
            $status->setMultiplicity($status->getMultiplicity() + 1);
            $em->flush();
        }
        
        return array();
        // ...
    }
}

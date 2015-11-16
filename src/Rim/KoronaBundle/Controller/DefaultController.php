<?php
namespace Rim\KoronaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    private function getNeedLink($link)
    {
        switch ($link) {
            case "winner":
                return "http://www.koronapromo.com.ua/winners";
                break;
            case "rollton":
                return "http://promo-rollton.com.ua/robots.txt";
                break;
            case "robots":
                return "http://www.koronapromo.com.ua/robots.txt";
                break;
            case "logo":
                return "http://www.koronapromo.com.ua/assets/images/logo.png";
                break;
            default:
                return  "http://www.homka.ua/robots.txt";
        }
    }
    
    private function getUTime()
    {
        $microtime = microtime();
        $rest = substr($microtime, 2, 3);
        $time = time();
        return $time . $rest;
    }

    /**
     * @Route("/diff/{link}/{diff_time}")
     */
    public function diffAction($link, $diff_time)
    {
        $web_tracker = $this->getNeedLink($link);
        
        $time = time();
        $check_time = ((substr($time, 0, 9) * 10000) + 10000);
        dump($check_time);
        $correct_time = $check_time + $diff_time;
        $correct_time = strval($correct_time);
        $check_time = strval($check_time);
        
        for ($i = 0; $i < 1100; $i ++) {
        
            if ($correct_time < $this->getUTime()) {
                $new_my_time = $this->getUTime();
        
                $html = get_headers($web_tracker);
                $date = $html[2];
                $ending_time = $this->getUTime();
                dump($date. "- время из заголовка");
                dump($correct_time. "- откорректированное время для запроса");
                dump($new_my_time. "- реальное время отправки запроса");
                dump(($new_my_time - $correct_time). "- погрешность запроса");
                dump($ending_time. "- время получения ответа");
                dump(($ending_time - $new_my_time). "- длительность запроса");
                dump((($ending_time - $new_my_time) + ($new_my_time - $correct_time)). "- общие затраты");
        
                break;
            }
        
            usleep(10000);
        }
        
        return new Response($web_tracker);
    }
    
    /**
     * @Route("/for_time/{my_time}")
     * @Template()
     */
    public function indexAction($my_time)
    {
        $new_my_time = 0;
        for ($i = 0; $i < 100; $i ++) {
            
            if ($my_time < $this->getUTime()) {
                $new_my_time = $this->getUTime();
                
                $web_tracker = $this->getNeedLink('rollton');
                
                $html = get_headers($web_tracker);
                $date = $html[2];
                
                break;
            }
            
            usleep(10000);
        }
        $ending_time = $this->getUTime();
        
        $str_new_my_time = $new_my_time . " время старта запроса\n";
        $str_my_time = $my_time . " проверяемое время\n";
        $str_ending_time = $ending_time . " время получения ответа\n";
        $str_date = $date . "   время из заголовка\n";
        $str_clarity = "                      " . ($new_my_time - $my_time) . "   время погрешности\n";
        $str_process = "                      " . ($ending_time - $new_my_time) . "   длительность запроса\n";
        
        $response = $str_new_my_time . $str_my_time . $str_ending_time . $str_clarity . $str_process . $str_date;
        return new Response($response);
    }

    /**
     * @Route("/some")
     */
    public function someAction()
    {
        return new Response('Определение временной разницы с сервером!');
    }

    /**
     * @Route("/winner")
     */
    public function winnerAction()
    {
        dump($this->getUTime()." - время старта скрипта");
        $web_tracker = 'http://www.koronapromo.com.ua/winners/list?offset=597';
        $html = file_get_contents($web_tracker);
        for ($i = 0; $i < 100; $i ++) {
            dump($this->getUTime(). " - время начала запроса к серверу ".$i);
            $$i = file_get_contents($web_tracker);
            dump($this->getUTime(). " - время получения ответа от сервера ".$i);
            if ($$i != $html) {
                dump($this->getUTime(). " - время когда произошло изменение после сравнения");
                dump($html);
                dump($$i);
                break;
            }
            
            usleep(50000);
        }
        
        return new Response($web_tracker);
    }
}

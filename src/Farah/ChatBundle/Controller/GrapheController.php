<?php

namespace Farah\ChatBundle\Controller;
use DataBundle\Entity\Discussion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;
class GrapheController extends Controller
{
    public function chartLineAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $discussions = $em->getRepository('DataBundle:Discussion')->findAll();
        $tab = array();
        $categories = array();
        foreach ($discussions as $discussion) {
            array_push($tab, $discussion->getIdDiscussion());
            array_push($categories, $discussion->getNomUtilisateur());
        }
// Chart
        $series = array(
            array("name" => "Nb étudiants", "data" => $tab)
        );
        $ob = new Highchart();
        $ob->chart->renderTo('linechart'); // #id du div où afficher le graphe
        $ob->title->text('Nombre des étudiants par niveau');
        $ob->xAxis->title(array('text' => "Classe"));
        $ob->yAxis->title(array('text' => "Nb étudiants"));
        $ob->xAxis->categories($categories);
        $ob->series($series);
        return $this->render('FarahChatBundle:Default:graphe.html.twig',
            array(
                'chart' => $ob
            ));
    }
    public function chartPieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Pourcentages des étudiants par niveau');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));
        $em= $this->container->get('doctrine')->getEntityManager();
        $classes = $em->getRepository('DataBundle:Discussion')->findAll();
$totalEtudiant=0;
foreach($classes as $classe) {
    $totalEtudiant=$totalEtudiant+$classe->getIdDiscussion();
}
$data= array();
foreach($classes as $classe) {
    $stat=array();
    array_push($stat,$classe->getNomUtilisateur(),(($classe->getIdDiscussion()) *100)/$totalEtudiant);
//var_dump($stat);
array_push($data,$stat);
}
// var_dump($data);
$ob->series(array(array('type' => 'pie','name' => 'Browser
share', 'data' => $data)));
return $this->render('FarahChatBundle:Default:graphe.html.twig',
    array(
        'chart' => $ob
    ));}

}

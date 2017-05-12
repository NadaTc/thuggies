<?php

namespace GrapheBundle\Controller;

use DataBundle\Entity\Assurance;
use DataBundle\Entity\Offre;
use DataBundle\Repository;
use Ob\HighchartsBundle\Highcharts\Highchart ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zend\Json\Expr;

class GrapheController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }



    public function chartHistogrammeAction()

    {

        $em= $this->container->get('doctrine')->getEntityManager();

        $classes = $em->getRepository('DataBundle:Vidange')->findAll();

$categories= array();

$nbEtudiants=array();


foreach($classes as $classe) {

    array_push($categories,$classe->getIdVoiture()->getImmatricule());

    array_push($nbEtudiants,$classe->getKilometrage());

}

$series = array(

    array(

        'name' => 'Vidange',

        'type' => 'column',

        'color' => '#4572A7',

        'yAxis' => 0,

        'data' => $nbEtudiants,

    )

);

$yData = array(

    array(

        'labels' => array(

            'formatter' => new Expr('function () { return

this.value + "" }'),

            'style' => array('color' => '#4572A7')

        ),

        'gridLineWidth' => 0,

        'title' => array(

            'text' => 'Kilometrage Effectuee',

            'style' => array('color' => '#4572A7')

        ),

    ),

);

$ob = new Highchart();

$ob->chart->renderTo('container'); // The #id of the div where to render the chart

$ob->chart->type('column');

$ob->title->text('Kilometrage Selon les Vidanges');

$ob->xAxis->categories($categories);



$ob->yAxis($yData);

$ob->legend->enabled(false);

        $formatter = new Expr('function () {

var unit = {

"Etudiant": "étudiant(s)",

}[this.series.name];

return this.x + ": <b>" + this.y + "</b> " + unit;

}');

        $ob->tooltip->formatter($formatter);

        $ob->series($series);

return $this->render('GrapheBundle:Graphe:histogramme.html.twig', array(

        'chart' => $ob

    ));

}










    public function chartPieAction(){
        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Assurance');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));
        $em= $this->container->get('doctrine')->getEntityManager();
        $classes = $em->getRepository('DataBundle:Assurance')->findAll();
        $totalEtudiant=0;
        foreach($classes as $classe) {
            $totalEtudiant=$totalEtudiant+1;
        }
        $data= array();
        $statr=array();
        $stat=array();
        $stati=array();


        $b='Kouti_assurant';
        $a='Amine';
        $c='Gat';


        $ref=$em->getRepository('DataBundle:Assurance')->statRef($a);
        $sauto=$em->getRepository('DataBundle:Assurance')->stat($b);
        $sau=$em->getRepository('DataBundle:Assurance')->statc($c);

        array_push($statr,'Kouti_assurant',(($ref) *100)/$totalEtudiant);
        array_push($stat,'Amine',(($sauto) *100)/$totalEtudiant);
        array_push($stati,'Gat',(($sau) *100)/$totalEtudiant);



        //var_dump($stat);}

        array_push($data,$stat,$statr,$stati);

       //  var_dump($data);

        $ob->series(array(array('type' => 'pie','name' => 'Browser share', 'data' => $data)));
        return $this->render('GrapheBundle:Graphe:pie.html.twig',
            array(
                'chart' => $ob
            ));
    }

}

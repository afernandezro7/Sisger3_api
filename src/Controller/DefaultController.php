<?php

namespace App\Controller;

use App\Entity\Recibo;
use App\Entity\Workspace;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_home", methods={"GET"})
     */
    public function index(Request $request): JsonResponse
    {
        //TODO: implement Token validation and get workspace of user
        $workspace = $this->getDoctrine()
            ->getRepository(Workspace::class)
            ->find(3)
        ;

        $range = $request->query->get('range');

        if ($range) {
            $arrayDates = explode(" - ", $range);

            $date1 = date_create_from_format('d/m/Y', $arrayDates[0]);
            $date2 = date_create_from_format('d/m/Y', $arrayDates[1]);

            $from = new \DateTime($date1->format("Y-m-d") . " 00:00:00");
            $to = new \DateTime($date2->format("Y-m-d") . " 23:59:59");
        } else {
            $now = new \DateTime();

            $year = $now->format('Y');
            $date1 = date_create_from_format('Y-m-d', $year - 1 . '-01-01');
            $date2 = $now;

            $from = new \DateTime($date1->format("Y-m-d") . " 00:00:00");
            $to = new \DateTime($date2->format("Y-m-d") . " 23:59:59");
        }

        $balance = array();
        $total_creditos = 0;
        $total_debitos = 0;
        $balance_general_faceta = 'recibos';

        if ($workspace->getName() == 'G-BRS') {
            $ws = null;
        } else {
            $ws = $workspace->getId();
        }

        $recibo_repository = $this->getDoctrine()->getRepository(Recibo::class);
        
        $resultados = $recibo_repository->findDateAndTotalImporteRecibosByRange($from, $to, $ws);
        $total_ingresos = $recibo_repository->findTotalImporteRecibosByRangeAndType($from, $to, 'Ingreso', $ws)[0][1];
        $total_gastos = $recibo_repository->findTotalImporteRecibosByRangeAndType($from, $to, 'Gasto', $ws)[0][1];
        $total_costos = $recibo_repository->findTotalImporteRecibosByRangeAndType($from, $to, 'Costo', $ws)[0][1];
        $total_costos_recurrentes = $recibo_repository->findTotalImporteRecibosByRangeAndType($from, $to, 'Costo Recurrente', $ws)[0][1];

        $total_ingresos = round($total_ingresos, 2);
        $total_gastos = round($total_gastos, 2);
        $total_costos = round($total_costos, 2);
        $total_costos_recurrentes = round($total_costos_recurrentes, 2);

        $total_balance = $total_ingresos + $total_gastos + $total_costos + $total_costos_recurrentes;

        for ($i = 0; $i < sizeof($resultados); $i++) {
            $fecha = $resultados[$i]['fecha'];
            $importe = $resultados[$i]['importe'];
            $anno = date_format($fecha, 'Y');
            $mes = date_format($fecha, 'M');
            $balance[$anno][$mes][] = $importe;
        }

        $annos = array_keys($balance);
        $balance_pre_json = array();
        foreach ($annos as $anno) {
            $meses_del_anno = array_keys($balance[$anno]);
            foreach ($meses_del_anno as $mes) {
                $importes_del_mes = $balance[$anno][$mes];
                $importe_total_del_mes = 0;
                foreach ($importes_del_mes as $importe_unitario) {
                    $importe_total_del_mes = $importe_total_del_mes + $importe_unitario;
                    $balance_pre_json[$anno][$mes][0] = $anno . '/' . $mes;
                    $balance_pre_json[$anno][$mes][1] = $importe_total_del_mes;
                }
            }
        }


        $response = new JsonResponse();
        $response->setData([
            'workspace' => $workspace->getName(),
            'balance_general' => $balance_pre_json,
            'dash_from' => date_format($from, ('Y-m-d')),
            'dash_to' => date_format($to, ('Y-m-d')),
            'range' => date_format($from, ('Y-m-d')) . ' - ' . date_format($to, ('Y-m-d')),
            'total_balance' => $total_balance,
            'total_ingresos' => $total_ingresos,
            'total_costos' => $total_costos,
            'total_costos_recurrentes' => $total_costos_recurrentes,
            'total_gastos' => $total_gastos,
            'total_creditos' => $total_creditos,
            'total_debitos' => $total_debitos,
            'balance_general_faceta' => $balance_general_faceta
        ]);
        return $response;
    }
}

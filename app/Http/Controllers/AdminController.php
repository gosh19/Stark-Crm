<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $operarios = \App\Operario::getAll();

        $hoy = Carbon::now();

        $datos = \App\Dato::whereDate( 'updated_at',$hoy)->get();

        $cantNa = 0;
        $cantPosible = 0;
        $cantVendido = 0;
        $cantNi = 0;
        $sinUsar = 0;
        $conComentario = 0;

        foreach ($datos as $key => $dato) {
            switch ($dato->case) {
                case 'na':
                    $cantNa++;
                    break;
                case 'posible':
                    $cantPosible++;
                    break;
                case 'vendido':
                    $cantVendido++;
                    break;
                case 'ni':
                    $cantNi++;
                    break;
                default:
                    if (count($dato->comentarios) != 0) {
                        $conComentario++;
                    }else{
                        $sinUsar++;
                    }
                    break;
            }
        }

        $chart = (new LarapexChart)->setTitle('Datos de Hoy = '.count($datos))
                   ->setDataset([$cantNa, $cantNi, $cantPosible, $cantVendido, $conComentario, $sinUsar])
                   ->setColors(['#FE2E2E','#FACC2E','#00FFFF','#00FF40','#8000FF','#6E6E6E'])
                   ->setLabels([
                                'No atienden ('.$cantNa.')', 
                                'No Interesados ('.$cantNi.')',
                                'Posibles ('.$cantPosible.')',
                                'Vendidos ('.$cantVendido.')',
                                'Con Comentarios ('.$conComentario.')',
                                'Sin estado ('.$sinUsar.')'
                            ]);
        
        $names = [];
        $nas = [];
        $nis = [];
        $posibles = [];
        $vendidos = [];
        $comentarios = [];
        $sinEstado = [];
        foreach ($operarios as $key => $op ) {
            $names[] = $op->name;
            $nas[] = \App\Dato::where([['user_id',$op->id],['case','na']])->whereDate( 'updated_at',$hoy)->count();
            $nis[] = \App\Dato::where([['user_id',$op->id],['case','ni']])->whereDate( 'updated_at',$hoy)->count();
            $posibles[] = \App\Dato::where([['user_id',$op->id],['case','posible']])->whereDate( 'updated_at',$hoy)->count();
            $vendidos[] = \App\Dato::where([['user_id',$op->id],['case','vendido']])->whereDate( 'updated_at',$hoy)->count();

            $otros = \App\Dato::where([['user_id',$op->id],['case',null]])->whereDate( 'updated_at',$hoy)->get();
            $cantComent = 0;
            $sinUso = 0;
            foreach ($otros as $key => $otr) {
                if (count($otr->comentarios) != 0) {
                    $cantComent++;
                }else{
                    $sinUso++;
                }
            }
            $comentarios[]= $cantComent;
            $sinEstado[] = $sinUso;
        }

        $OpChart = (new LarapexChart)->setTitle('Datos por operadora')
        ->setType('bar')
        ->setXAxis($names)
        ->setGrid(true)
        ->setDataset([
            [
                'name'  => 'No atiende',
                'data'  =>  $nas
            ],
            [
                'name'  => 'No interesado',
                'data'  => $nis
            ],
            [
                'name'  => 'Posibles',
                'data'  => $posibles
            ],
            [
                'name'  => 'Vendidos',
                'data'  => $vendidos
            ],
            [
                'name'  => 'Con comentario',
                'data'  => $comentarios
            ],
            [
                'name'  => 'Sin uso',
                'data'  => $sinEstado
            ]
        ])
        ->setStroke(1);

        return view('admin.index', ['operarios' => $operarios, 'chart' => $chart, 'OpChart' => $OpChart]);
    }

}

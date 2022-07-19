<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Rap2hpoutre\FastExcel\FastExcel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

 /*
            ::get();-> Trae todos los registros de la base de datos
            ::first();-> Trae el primer registro de la base de datos
            ::find(id); -> Busca un registro en la base de datos por medio de su id
            ::latest(); -> Trae todos los registros de la base de datos, y los ordena de forma descendente

            adicional, podemos utilizar el método paginate(), para realizar la paginación, solo no nos debemos de incluir en nuestras vistas la propiedad links() para que podamos visualizar los controles de paginación
    */

class PageController extends Controller
{
    

    public function home()
    {
        
        return view('welcome');

    }

    public function dashboard(Cliente $clientes, Factura $facturas)
    {
        
        $id_usuario=Auth::user()->id;

        $clientes=Cliente::where('id_usuario','=',$id_usuario)->latest()->take(5)->get();
        $facturas=Factura::where('id_usuario','=',$id_usuario)->latest()->take(5)->get();
        

        return view('dashboard', ['clientes' => $clientes, 'facturas' => $facturas]);

    }


    public function clientes(Cliente $clientes)
    {

        $id_usuario=Auth::user()->id;
        $clientes=Cliente::where('id_usuario','=',$id_usuario)->latest()->simplePaginate();


        return view('clientes', ['clientes' => $clientes]);

    }



    public function nuevocliente(Cliente $cliente)
    {

        return view("nuevocliente", ['cliente' => $cliente]);

    }


    public function editarcliente(Cliente $cliente)
    {

        return view("editarcliente", ['cliente' => $cliente]);

    }


    public function guardarcliente(Request $request)
    {

        $id_usuario=Auth::user()->id;

        $request->validate([
            'nombre' => 'required',
            'email'  => 'required',
            'nif_cif' => 'required'
        ]);
        
        $cliente = Cliente::create([

           'id_usuario' => $id_usuario,
           'nombre' => $request->nombre,
           'empresa' => $request->empresa,
           'email' => $request->email,
           'nif_cif' => $request->nif_cif,
           'telefono' => $request->telefono,
           'direccion' => $request->direccion,
           'ciudad' => $request->ciudad,
           'provincia' => $request->provincia,
           'pais' => $request->pais

        ]);

        //return redirect()->route('posts.edit',$post);
        return redirect()->route('clientes');

    }
 

    public function actualizarcliente (Request $request, Cliente $cliente)
    {


        $request->validate([
            'nombre' => 'required',
            'email'  => 'required',
            'nif_cif' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
            'pais' => 'required'
        ]);

        $cliente->update([

           'nombre' => $request->nombre,
           'empresa' => $request->empresa,
           'email' => $request->email,
           'nif_cif' => $request->nif_cif,
           'telefono' => $request->telefono,
           'direccion' => $request->direccion,
           'ciudad' => $request->ciudad,
           'provincia' => $request->provincia,
           'pais' => $request->pais
 
         ]);
 
         return redirect()->route('clientes');


    }


    public function eliminarcliente(Cliente $cliente)
    {

        $cliente->delete();
        Alert::success('Cliente eliminado', '¡Cliente eliminado correctamente!');
        return back();

    } 


    public function exportarclientesexcel(Cliente $clientes)
    {

        /*(new FastExcel(Cliente::all()))->export('clientes.csv', function ($cliente) {
            return [
                'Nombre' => $cliente->nombre
            ];
        });
        */
        $id_usuario=Auth::user()->id;
        return (new FastExcel(Cliente::where('id_usuario','=',$id_usuario)->get()))->download('clientes.xlsx');

    }

    public function facturas(Factura $facturas)
    {

        $facturas=Factura::latest()->paginate();
    
        return view("facturas", ['facturas' => $facturas]);

    }

    public function nuevafactura(Cliente $clientes)
    {

        $id_usuario=Auth::user()->id;
        $clientes=Cliente::where('id_usuario','=',$id_usuario)->get();
        return view("nuevafactura", ['clientes' => $clientes]);

    }

    public function guardarfactura(Request $request, Cliente $cliente)
    {
        $id_usuario=Auth::user()->id;

        $request->validate([
            'numero_factura' => 'required',
            'cliente' => 'required',
            'importe'  => 'required',
            'iva' => 'required',
            'concepto' => 'required'
        ]);


        $cliente=Cliente::find($request->cliente);
       
        $data = array($cliente->nombre, $cliente->empresa, $cliente->nif_cif, $cliente->direccion, $cliente->ciudad, $cliente->provincia, $cliente->pais, $request->importe, $request->iva, $request->concepto, $request->numero_factura);
        $pdf = Pdf::loadView('download', ['datos' => $data, 'usuario' => Auth::user()]);
        
        $cadena=md5(microtime());

        $path = public_path('pdf');
        $pdf->save($path . '/' . $cadena."_invoice.pdf");
        //Storage::put('public/pdf/invoice.pdf', $pdf->output());
        
        
        Factura::create([

            'numero_factura' => $request->numero_factura,
            'id_cliente' => $request->cliente,
            'id_usuario' => $id_usuario,
            'factura' => 'pdf/' . $cadena."_invoice.pdf"
 
         ]);


        return $pdf->download('invoice.pdf');



    }


}

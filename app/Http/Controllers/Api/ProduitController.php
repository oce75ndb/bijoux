<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Models\Produit;

class ProduitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
        
    public function index()
    {
        $output = new ConsoleOutput();
        $output->writeln("Get all produits");
        return response()->json(Produit::all());
    }

    public function store(Request $request)
    {
        $output = new ConsoleOutput();
        $output->writeln("Add new categorie");
        $output->writeln("Request data: " . json_encode($request->all()));

        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $produit = Produit::create($request->all());
        $output->writeln("Après insertion");

        $output->writeln("Produit created: " . json_encode($produit));
        return response()->json($produit, 201);
    }

    public function destroy($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Delete produit with id: " . $id);
        $produit = Produit::findOrFail($id);
        $produit->delete();
        $output->writeln("prduit deleted: " . json_encode($produit));
        return response()->json(null, 204);
    }

}

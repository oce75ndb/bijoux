<?php

namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

use App\Models\Categorie;

class CategorieController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function index()
    {
        $output = new ConsoleOutput();
        $output->writeln("Get all categories");
        return response()->json(Categorie::all());
    }

    public function store(Request $request)
    {
        $output = new ConsoleOutput();
        $output->writeln("Add new categorie");
        $output->writeln("Request data: " . json_encode($request->all()));

        try {
            $request->validate([
                'categorie' => 'required|string|max:255',
            ]);
            $output->writeln("Validation passed");
            
            $categorie = Categorie::create($request->all());
            $output->writeln("Après insertion");

            $output->writeln("Categorie created: " . json_encode($categorie));
            return response()->json($categorie, 201);
        }
        catch (\Exception $e) {
            $output->writeln("Insertion failed: " . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function update(Request $request, $id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Update categorie");
        $output->writeln("Request data: " . json_encode($request->all()));

        try {
            $categorie = Categorie::find($id);
            if (!$categorie) {
                return response()->json(['error' => 'Catégorie non trouvée'], 404);
            }
            $request->validate([
                'categorie' => 'required|string|unique:categories,categorie,' . $id
            ]);
            $categorie->update([
                'categorie' => $request->categorie
            ]);
            $output->writeln("Categorie updated: " . json_encode($categorie));
            return response()->json($categorie, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function destroy($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Delete categorie with id: " . $id);

        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        $output->writeln("Categorie deleted: " . json_encode($categorie));

        return response()->json(null, 204);
    }
    public function show($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Get categorie with id: " . $id);
        $categorie = Categorie::findOrFail($id);
        return response()->json($categorie);
    }
}

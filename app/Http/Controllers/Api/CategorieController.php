<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
class CategorieController extends Controller
{
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

        $request->validate([
            'categorie' => 'required|string|max:255',
        ]);

        $categorie = Categorie::create($request->all());
        $output->writeln("Après insertion");

        $output->writeln("Categorie created: " . json_encode($categorie));
        return response()->json($categorie, 201);
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

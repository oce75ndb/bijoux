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
            'nom' => 'required|string|max:255',
        ]);

        $categorie = Categorie::create($request->all());

        return response()->json($categorie, 201);
    }
}

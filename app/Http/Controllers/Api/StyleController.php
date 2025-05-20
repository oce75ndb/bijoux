<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
class StyleController extends Controller
{
    public function index()
    {
        $output = new ConsoleOutput();
        $output->writeln("Get all styles");
        return response()->json(Style::all());
    }

    public function store(Request $request)
    {
        $output = new ConsoleOutput();
        $output->writeln("Add new style");
        $output->writeln("Request data: " . json_encode($request->all()));

        $request->validate([
            'style' => 'required|string|max:255',
        ]);

        $style = Style::create($request->all());

        $output->writeln("Style created: " . json_encode($style));
        return response()->json($style, 201);
    }

    public function destroy($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Delete style with id: " . $id);
        $style = Style::findOrFail($id);
        $style->delete();
        $output->writeln("Style deleted: " . json_encode($style));
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Get style with id: " . $id);
        $style = Style::findOrFail($id);
        return response()->json($style);
    }
}

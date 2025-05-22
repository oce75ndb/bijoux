<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Models\Fabrication;


class FabricationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $output = new ConsoleOutput();
        $output->writeln("Get all fabrications");
        return response()->json(Fabrication::all());
    }

    public function store(Request $request)
    {
        $output = new ConsoleOutput();
        $output->writeln("Add new fabrication");
        $output->writeln("Request data: " . json_encode($request->all()));

        $request->validate([
            'fabrication' => 'required|string|max:255',
        ]);

        $fabrication = Fabrication::create($request->all());

        $output->writeln("Fabrication created: " . json_encode($fabrication));
        return response()->json($fabrication, 201);
    }

    public function destroy($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Delete fabrication with id: " . $id);
        $fabrication = Fabrication::findOrFail($id);
        $fabrication->delete();
        $output->writeln("Fabrication deleted: " . json_encode($fabrication));
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Get fabrication with id: " . $id);
        $fabrication = Fabrication::findOrFail($id);
        return response()->json($fabrication);
    }
}

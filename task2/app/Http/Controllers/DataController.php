<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getData();

        $sortColumn = $request->input('sortColumn', 'name');
        $sortDirection = $request->input('sortDirection', 'asc');
        $currentPage = $request->input('page', 1);
        $perPage = 5;

        usort($data, function ($a, $b) use ($sortColumn, $sortDirection) {
            return $sortDirection === 'asc'
                ? $a[$sortColumn] <=> $b[$sortColumn]
                : $b[$sortColumn] <=> $a[$sortColumn];
        });

        $total = count($data);
        $start = ($currentPage - 1) * $perPage;
        $pagedData = array_slice($data, $start, $perPage);

        return view('tableView', [
            'data' => $pagedData,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $currentPage,
            'sortColumn' => $sortColumn,
            'sortDirection' => $sortDirection,
        ]);
    }

    private function getData()
    {
        $path = storage_path('app/data.json'); // Path to the JSON file
        if (!file_exists($path)) {
            return []; // Return empty array if file does not exist
        }

        $json = file_get_contents($path);
        return json_decode($json, true); // Decode JSON data into PHP array
    }
}

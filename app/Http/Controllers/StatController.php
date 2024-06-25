namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $salesData = [
            ['month' => 'Janvier', 'sales' => 12345],
            ['month' => 'Février', 'sales' => 10987],
            ['month' => 'Mars', 'sales' => 61177],
            ['month' => 'Avril', 'sales' => 11234],
            ['month' => 'Mai', 'sales' => 13456],
            ['month' => 'Juin', 'sales' => 14567],
            ['month' => 'Juillet', 'sales' => 12345],
            ['month' => 'Août', 'sales' => 11234],
            ['month' => 'Septembre', 'sales' => 13456],
            ['month' => 'Octobre', 'sales' => 14567],
            ['month' => 'Novembre', 'sales' => 12345],
            ['month' => 'Décembre', 'sales' => 10987],
        ];
        $totalSales = array_sum(array_column($salesData, 'sales'));
        $averageSales = $totalSales / count($salesData);
        $bestMonth = collect($salesData)->sortByDesc('sales')->first();

        return view('components.stat-bon', compact('currentYear', 'salesData', 'totalSales', 'averageSales', 'bestMonth'));
    }
}

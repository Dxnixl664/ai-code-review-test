<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function export(Request $request): RedirectResponse
    {
        // Fetch
        $startDate = $request->query('start_date', now()->subMonth()->toDateString());
        $endDate = $request->query('end_date', now()->toDateString());
        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        // Transform
        $rows = [];
        $totalRevenue = 0;
        foreach ($orders as $order) {
            $totalRevenue += $order->total;
            $rows[] = [
                'id' => $order->id,
                'total' => $order->total,
                'date' => $order->created_at->toDateString(),
            ];
        }

        // Format
        $csv = "ID,Total,Date\n";
        foreach ($rows as $row) {
            $csv .= "{$row['id']},{$row['total']},{$row['date']}\n";
        }
        $csv .= "\nTotal Revenue,{$totalRevenue}\n";

        $filename = 'reports/report-'.now()->timestamp.'.csv';
        Storage::disk('local')->put($filename, $csv);

        // Email
        Mail::raw("Your report is ready. Total revenue: \${$totalRevenue}", function ($message) use ($request) {
            $message->to($request->user()->email)->subject('Your export is ready');
        });

        return back()->with('success', 'Report generated and emailed to you.');
    }
}

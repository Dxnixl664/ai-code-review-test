<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceStatusController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'overdue');

        $invoices = Invoice::where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Invoices/ByStatus', [
            'invoices' => $invoices,
            'status' => $status,
        ]);
    }
}

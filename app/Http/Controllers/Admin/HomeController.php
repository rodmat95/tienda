<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $counts = $this->getCounts();
        $distributionsData = $this->getDistributions();
        $salesData = $this->getSales();

        return view('admin.index', compact('counts', 'distributionsData', 'salesData'));
    }

    private function getCounts()
    {
        $userCounts = User::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->whereBetween('created_at', [now()->subMonths(5), now()])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $productCounts = Product::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->whereBetween('created_at', [now()->subMonths(5), now()])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $supplierCounts = Supplier::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->whereBetween('created_at', [now()->subMonths(5), now()])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        return compact('userCounts', 'productCounts', 'supplierCounts');
    }

    private function getDistributions()
    {
        $distributions = Distribution::with('product')->whereHas('supplier', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        $productForDistributions = $distributions->pluck('product.name')->toArray();
        $stockForDistributions = $distributions->pluck('stock')->toArray();

        return compact('productForDistributions', 'stockForDistributions');
    }

    private function getSales()
    {
        $distributions = Distribution::with(['product', 'salesDetails'])->whereHas('supplier', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        $salesByDistributions = $distributions->map(function ($distribution) {
            $totalSalesCount = $distribution->salesDetails->sum('quantity');

            return [
                'distribution_name' => $distribution->product->name,
                'total_sales_count' => $totalSalesCount,
            ];
        })->toArray();

        return compact('salesByDistributions');
    }
}
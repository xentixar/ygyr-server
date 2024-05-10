<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WarehouseController extends Controller
{
    public function __invoke(Request $request): View
    {
        $warehouses = Warehouse::query()->orderBy('id', 'DESC')->paginate(10);

        return view('admin.warehouses.index', compact('warehouses'));
    }
}

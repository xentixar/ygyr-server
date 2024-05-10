<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Warehouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function index(): View
    {
        $donations = Donation::query()->orderBy('id', 'DESC')->paginate(10);
        return view('admin.donations.index', compact('donations'));
    }

    public function store(Request $request): void
    {
        abort(404);
    }

    public function show(string $id): void
    {
        abort(404);
    }

    public function edit(string $id): View
    {
        $donation = Donation::query()->findOrFail($id);
        return view('admin.donations.edit', compact('donation'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'weight' => 'required'
        ]);

        $donation = Donation::query()->findOrFail($id);

        Warehouse::query()->create([
            'label_id' => $donation->label_id,
            'user_id' => $donation->user_id,
            'image' => $donation->image,
            'weight' => $validated['weight']
        ]);

        $donation->update([
            'status' => true
        ]);

        $donation->user->update([
            'points' => $donation->user->points + 10,
        ]);

        return redirect()->route('admin.donations.index');
    }

    public function create(): void
    {
        abort(404);
    }

    public function destroy(string $id): RedirectResponse
    {
        $donation = Donation::query()->findOrFail($id);
        $donation->delete();
        return redirect()->route('admin.donations.index');
    }
}

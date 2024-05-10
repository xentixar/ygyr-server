<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LabelController extends Controller
{
    public function index(): View
    {
        $labels = Label::query()->orderBy('id', 'DESC')->paginate(10);

        return view('admin.labels.index', compact('labels'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Label::query()->create($validatedData);

        return redirect()->route('admin.labels.index');
    }

    public function create(): View
    {
        return view('admin.labels.create');
    }

    public function show(string $id): void
    {
        abort(404);
    }

    public function edit(string $id): View
    {
        $label = Label::query()->findOrFail($id);

        return view('admin.labels.edit', compact('label'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $label = Label::query()->findOrFail($id);
        $label->fill($validatedData);

        return redirect()->route('admin.labels.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $label = Label::query()->findOrFail($id);
        $label->delete();

        return redirect()->route('admin.labels.index');
    }
}

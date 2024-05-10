<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\Usage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsageController extends Controller
{
    protected Builder|Model|null $label;

    public function __construct(Request $request)
    {
        $this->label = Label::query()->findOrFail($request->query('label'));
    }

    public function index(): View
    {
        $usages = Usage::query()->where('label_id', '=', $this->label->getAttribute('id'))->paginate();

        return view('admin.usages.index', ['usages' => $usages, 'label' => $this->label]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
        ]);

        $validatedData['label_id'] = $this->label->getAttribute('id');

        Usage::query()->create($validatedData);

        return redirect(route('admin.usages.index', ['label' => $this->label->getAttribute('id')]));
    }

    public function create(): View
    {
        return view('admin.usages.create');
    }

    public function show(string $id): void
    {
        abort(404);
    }

    public function edit(string $id): View
    {
        $usage = Usage::query()->findOrFail($id);

        return view('admin.usages.edit', compact('usage'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
        ]);

        $usage = Usage::query()->findOrFail($id);
        $usage->update($validatedData);

        return redirect(route('admin.usages.index', ['label' => $this->label->getAttribute('id')]));
    }

    public function destroy(string $id): RedirectResponse
    {
        $usage = Usage::query()->findOrFail($id);
        $usage->delete();

        return redirect(route('admin.usages.index', ['label' => $this->label->getAttribute('id')]));
    }
}

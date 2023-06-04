<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class Todo extends Controller
{
    private $url = 'https://dev.hisptz.com/dhis2/api/dataStore/naifMbarak';

    /*
     * Display all Todos
     */
    public function index(): View
    {
        $response = Http::withBasicAuth('admin', 'district')->get($this->url, [
            'fields' => '.',
        ]);
        $data = $response->collect('entries')->sortBy('value.created');
        $pager = $response->collect('pager');
        $id = 'todo-' . $this->counter();

        return view('todos', ['data' => $data, 'pager' => $pager, 'id' => $id]);
    }

    /*
     *Display a form to create a new Todo
     */
    public function create()
    {

    }

    /*
     * Store new Todo
     */
    public function store(Request $request)
    {
        $id = 'todo-' . $this->counter();
        $request->validate([
            'title' => 'required'
        ]);
        $completed = $request->get('completed') ? true : false;
        $response = Http::withBasicAuth('admin', 'district')->post($this->url . '/' . $id, [
            'id' => $id,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'completed' => $completed,
            'created' => Carbon::now()->toIso8601String(),
            'lastUpdated' => Carbon::now()->toIso8601String(),
        ]);

        return redirect('/todos');

    }

    /*
     * Display a todo
     */
    public function show(string $id)
    {
        $response = Http::withBasicAuth('admin', 'district')->get($this->url . '/' . $id);
        if ($response->notFound()) {
            abort(404);
        }

        $data = $response->json();

        return view('todo', ['data' => $data]);

    }

    /*
     * Show a form to edit a todo
     */
    public function edit()
    {

    }

    /*
     * Update a todo
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);
        $created = Http::withBasicAuth('admin', 'district')
            ->get($this->url . '/' . $id)
            ->collect()->get('created');


        $completed = $request->get('completed') ? true : false;
        $response = Http::withBasicAuth('admin', 'district')->put($this->url . '/' . $id, [
            'id'=>$id,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'completed' => $completed,
            'created' => $created,
            'lastUpdated' => Carbon::now()->toIso8601String()
        ]);
        return redirect('/todos');
    }

    /*
     * Delete a todo
     */
    public function destroy(string $id): RedirectResponse
    {
        $response = Http::withBasicAuth('admin', 'district')->delete($this->url . '/' . $id);

        return redirect('/todos');

    }

    private function counter(): int
    {
        $response = Http::withBasicAuth('admin', 'district')->get($this->url, [
            'fields' => '.',
        ]);
        $data = $response->collect('entries')->sortBy('value.created');
        if ($data->count() == 0)
            return 1;

        $lastKey = $response->collect('entries')->sortBy('value.created')->last()['key'];
        $counter = explode('-', $lastKey);


        return (int)$counter[1] + 1;

    }

}


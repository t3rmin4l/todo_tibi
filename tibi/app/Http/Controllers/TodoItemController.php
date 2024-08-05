<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoItemRequest;
use App\Http\Resources\TodoItemResource;
use App\Models\TodoItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $todoItems = TodoItem::orderBy('id', 'desc')->get();

        return response()->json([
            'todoItems' => TodoItemResource::collection($todoItems),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoItemRequest $request): JsonResponse
    {
        $todoItem = new TodoItem();
        $todoItem->name = $request->input('name');
        $todoItem->description = $request->input('description');
        $todoItem->completed = $request->input('completed');
        $todoItem->save();

        return response()->json(['message' => 'new todo item created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): JsonResponse
    {
        $todoItem = TodoItem::findOrFail($id);

        return response()->json(new TodoItemResource($todoItem));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTodoItemRequest $request, string $id): JsonResponse
    {
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->name = $request->input('name');
        $todoItem->description = $request->input('description');
        $todoItem->completed = $request->input('completed');
        $todoItem->save();

        return response()->json(['message' => 'todo item updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $todoItem = TodoItem::findOrFail($id);
        $todoItem->delete();

        return response()->json(['message' => 'todo item deleted']);

    }
}

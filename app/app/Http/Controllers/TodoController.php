<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/**
 * Class TodoController
 * @author viktigpetterr
 */
class TodoController extends Controller
{
    public function getTodos(Request $request, int $categoryId): JsonResponse
    {
        $todos = DB::table('todos')
            ->get()
            ->where('category_id', '=', $categoryId);

        return new JsonResponse($todos);
    }

    public function addTodo(Request $request, int $categoryId): JsonResponse
    {
        $json = \json_decode($request->getContent(), true);
        $text = isset($json['text']) ? $json['text'] : null;
        $wasInserted = DB::table('todos')->insert(['text' => $text]);
        $newId = $wasInserted ? DB::table('todos')->where('text', $text)->distinct()->value('id') : null;

        return $newId !== null ?  new JsonResponse(['id' => $newId]) : new JsonResponse("", 400);
    }

    public function deleteTodo(int $categoryId, int $todoId): Response
    {
        $wasDeleted = DB::table('todos')->where('id', $todoId)->delete();

        return $wasDeleted ? new Response() : new Response("", 403);
    }

    public function todoDone(int $categoryId, int $todoId): JsonResponse
    {
        $done = DB::table('todos')
            ->where('id', $todoId)
            ->select('done')
            ->get()[0]->done;

        $wasToggled = DB::table('todos')
            ->where('id', $todoId)
            ->update(['done' => !$done]);

        return $wasToggled ? new JsonResponse($done) : new JsonResponse($done, 400);
    }
}

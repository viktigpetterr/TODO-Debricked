<?php


namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryController
 * @author viktigpetterr
 */
class CategoryController extends Controller
{
    public function getCategories(Request $request): JsonResponse
    {
        $categories = DB::table('categories')->select(['id', 'name'])->get();
        foreach ($categories as $category)
        {
            $category->numberOfTodos = DB::table('todos')->count();
        }
        return new JsonResponse($categories);
    }

    public function addCategory(Request $request): JsonResponse
    {
        $json = json_decode($request->getContent(), true);
        $name = isset($json['name']) ? $json['name'] : null;
        $wasInserted = DB::insert('insert into categories (name) values (?)', [$name]);
        $newId = $wasInserted ? DB::table('categories')->where('name', $name)->value('id') : null;

        return $newId !== null ?  new JsonResponse(['id' => $newId]) : new JsonResponse("", 403);
    }

    public function deleteCategory(Request $request, int $categoryId): Response
    {
        $wasDeleted = DB::insert('delete from categories where id = (?)', [$categoryId]);

        return $wasDeleted ? new Response() : new Response("", 403);
    }
}

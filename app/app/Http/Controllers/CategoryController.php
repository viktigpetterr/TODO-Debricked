<?php


namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = DB::table('categories')
            ->select(['id', 'name'])
            ->where('user_id', '=', 1)
            ->get();
        foreach ($categories as $category)
        {
            $category->numberOfTodos = DB::table('todos')
                ->where('category_id', '=', $category->id)
                ->count('*');
        }

        return new JsonResponse($categories);
    }

    public function addCategory(Request $request): JsonResponse
    {
        $json = \json_decode($request->getContent(), true);
        $name = isset($json['name']) ? $json['name'] : null;
        $category = new Category();
        $category->name = $name;
        $category->user_id = 1;

        $wasInserted = $category->save();

        return $wasInserted ? new JsonResponse(['id' => $category->id]) : new JsonResponse("", 403);
    }

    public function deleteCategory(Request $request, int $categoryId): Response
    {
        $wasDeleted = DB::insert('delete from categories where id = (?)', [$categoryId]);

        return $wasDeleted ? new Response() : new Response("", 403);
    }
}

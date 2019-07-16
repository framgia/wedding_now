<?php

namespace App\Http\Controllers\User;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Item\ItemRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    protected $category;
    protected $item;

    public function __construct(CategoryRepositoryInterface $category, ItemRepositoryInterface $item)
    {
        $this->category = $category;
        $this->item = $item;
    }

    public function getItem(Request $request)
    {
        $items = $this->category->getItem($request->id);

        return $items;

        $itemsNearUser = $this->category->getItemNearUser($request->id);

        return view('user.sections.product_modal', compact('items', 'itemsNearUser'));
    }

    public function getItemByCategory(Request $request)
    {
        return $this->item->getItemByCategory($request->id);
    }

    public function seachItem(Request $request)
    {
        $items = $this->category->seachItem($request->id, $request->keyword, $request->filterPrice);

        $itemsNearUser = $this->category->seachItemsNearUser($request->id, $request->keyword, $request->filterPrice);

        return view('user.sections.search_product', compact('items', 'itemsNearUser'));
    }
}

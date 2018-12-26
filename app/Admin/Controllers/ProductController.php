<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\Brand;
use App\Models\Category;
use DB;
use Log;

class ProductController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->id('Id');
        $grid->categoryid('Categoryid');
        $grid->code('Code');
        $grid->name('Name');
        $grid->title('Title');
        $grid->amount('Amount');
        $grid->original('Original');
        $grid->unit('Unit');
        $grid->stock('Stock');
        $grid->brandid('Brandid');
        $grid->issell('Issell');
        $grid->isTop('IsTop');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->id('Id');
        $show->categoryid('Categoryid');
        $show->code('Code');
        $show->name('Name');
        $show->title('Title');
        $show->amount('Amount');
        $show->original('Original');
        $show->unit('Unit');
        $show->stock('Stock');
        $show->brandid('Brandid');
        $show->issell('Issell');
        $show->isTop('IsTop');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);

        $form->select('categoryid','分类')->options(Category::where('level','=','2')->pluck('title','id'));

        $form->text('code', 'Code');
        $form->text('name', 'Name');
        $form->text('title', 'Title');
        $form->decimal('amount', 'Amount');
        $form->decimal('original', 'Original');
        $form->text('unit', 'Unit');
        $form->number('stock', 'Stock');
        $form->image('picurl', '图片');
        //$form->number('brandid', 'Brandid');
        $brands = Brand::where('id','>','0')->get(['id',DB::raw('name as text')]);

        $form->select('brandid','品牌')->options(Brand::pluck('name', 'id'));
        $form->switch('issell', 'Issell');
        $form->switch('isTop', 'IsTop');

        return $form;
    }
}

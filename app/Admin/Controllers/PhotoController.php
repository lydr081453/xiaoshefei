<?php

namespace App\Admin\Controllers;

use App\Models\Photo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PhotoController extends Controller
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
        $grid = new Grid(new Photo);

        $grid->id('Id');
        $grid->type('Type');
        $grid->photourl('Photourl');
        $grid->title('Title');
        $grid->isshow('Isshow');
        $grid->position('Position');
        $grid->linkurl('Linkurl');
        $grid->key('Key');
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
        $show = new Show(Photo::findOrFail($id));

        $show->id('Id');
        $show->type('Type');
        $show->photourl('Photourl');
        $show->title('Title');
        $show->isshow('Isshow');
        $show->position('Position');
        $show->linkurl('Linkurl');
        $show->key('Key');
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
        $form = new Form(new Photo);

        //$form->text('type', 'Type');
        $form->select('type','类型')->options(['banner'=>'banner','index'=>'index']);
        $form->image('photourl', '图片');
        $form->text('title', 'Title');
        $form->switch('isshow', 'Isshow');
        $form->number('position', 'Position');
        $form->text('linkurl', 'Linkurl');
        $form->text('key', 'Key');

        return $form;
    }
}

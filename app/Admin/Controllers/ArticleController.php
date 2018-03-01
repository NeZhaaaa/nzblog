<?php

namespace App\Admin\Controllers;

use App\Tag;

use App\Article;
use App\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ArticleController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('文章管理');
            $content->description('修改文章');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->category()->name('分类');
            $grid->subject()->name('专题');
            $grid->tags()->display(function ($roles) {

                $roles = array_map(function ($role) {
                    return "<span class='label label-success'>{$role['name']}</span>";
                }, $roles);
        
                return join('&nbsp;', $roles);
            });
        
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article::class, function (Form $form) {

            $form->display('id', '文章id');
            $form->text('title', '标题');
            $form->text('author','作者')->value(config('admin.author'));
            $form->select('category_id', '类型')->options('/api/categories');
            $form->select('subject_id', '专题')->options('/api/subjects');
            $form->multipleSelect('tags')->options(Tag::all()->pluck('name', 'id'));
            $form->image('cover', '封面');
            $form->editor('body', '内容');
            $form->datetime('created_at');
            $form->datetime('updated_at');

        });
    }
}

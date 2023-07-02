<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use App\Models\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\App;


class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Project';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new Project());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('domain', __('Domain'));
        $grid->column('Site Code')->display(function () {
            $app_url = env('APP_URL');
            return htmlspecialchars("<script src=\"{$app_url}/clickmap.js/{$this->id}\"></script>");
        });
        $grid->column('show')->display(function () {
            return "<a href='/admin/projects/{$this->id}'>Show</a>";
        }); 
        $grid->disableActions();
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


        $grid = new Grid(new Page);
        $grid -> model()->where('project_id', $id);
        $grid->column('id', __('Id'));
        $grid->column('url', __('url'));
        $grid->column('heatmap')->display(function () {
            return "<a href='/admin/heatmap/{$this->id}'>Show</a>";
        });
        $grid->column('Statistic')->display(function () {
            return "<a href='/admin/statistic/{$this->id}'>Show</a>";
        });

        $grid->disableActions();
        return $grid;

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Project());

        $form->text('name', __('Name'));
        $form->text('domain', __('Domain'));


        return $form;
    }
}

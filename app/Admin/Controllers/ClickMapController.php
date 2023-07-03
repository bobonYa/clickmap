<?php

namespace App\Admin\Controllers;

use App\Models\ClickMap;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Page;
use Carbon\Carbon;
use Encore\Admin\Layout\Content;

// use Encore\Admin\Layout\Content;



class ClickMapController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ClickMap';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ClickMap());

        $grid->column('id', __('Id'));
        $grid->column('page_id', __('Page id'));
        $grid->column('x', __('X'));
        $grid->column('y', __('Y'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(ClickMap::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('page_id', __('Page id'));
        $show->field('x', __('X'));
        $show->field('y', __('Y'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ClickMap());

        $form->number('page_id', __('Page id'));
        $form->decimal('x', __('X'));
        $form->decimal('y', __('Y'));
        return $form;
    }


    /**
     * @param int $id
     * 
     * @return Content
     */
    public function getHeatMap(int $id){
        $page = Page::find($id);

        $collection = ClickMap::groupBy('x','y')
            ->selectRaw('count(*) as total, x,y')->where('page_id',$id)
            ->get();
        $content = new Content();
        $content->header('Heatmap');
        $content->description($page->url);
        $content->view('admin.heatmap',['url' => $page->url,'clicks'=>$collection]);

        
        return $content;
    }


    /**
     * @param int $id
     * 
     * @return Content
     */
    public function getHourStatistics(int $id,Content $content){
        $grid = new Grid(new ClickMap);
        $grid -> model()->where('page_id',$id)->groupBy('created_at')->selectRaw('count(*) as total, created_at');
        $grid->column('created_at', __('Time'));
        $grid->column('total', __('Total click'));
        $grid->disableActions();
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row($grid->render());
 
    }
}

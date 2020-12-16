<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StyleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Style as Model;
/**
 * Class StyleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StyleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Style::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/style');
        CRUD::setEntityNameStrings('style', 'styles');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns
        CRUD::modifyColumn("img",['type' => 'image','prefix' => 'img/style/']); 
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StyleRequest::class);
        
        // OPTION
            $current_id = \Route::current()->parameter('id');
            $options = [];
            $options[0] = "--- Mời chọn danh mục cha";
            if(empty($current_id)){
                $list_style = Model::all();
            }else{
                $list_style = Model::where("id","!=",$current_id)->get();
            }
            
            foreach($list_style as $item){
                $options[$item->id] = $item->content;
            }
        //

        CRUD::setFromDb(); // fields
        CRUD::modifyField("content",['type' => 'text','label' => 'Tiêu đề']); 
        CRUD::modifyField("img",['type' => 'image','aspect_ratio' => 1,'label' => 'Hình Style','prefix' => "img/style/"]); 
        CRUD::modifyField("parent",[
            'type'      => 'select_from_array',
            'label'     => "Danh mục cha",
            'name' => 'parent',
            'options' => $options,

        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

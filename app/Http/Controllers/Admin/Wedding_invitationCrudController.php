<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Wedding_invitationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Wedding_invitation as Model;
use App\Models\Color as ModelColor;
use App\Models\Style as ModelStyle;
/**
 * Class Wedding_invitationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Wedding_invitationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Wedding_invitation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/wedding_invitation');
        CRUD::setEntityNameStrings('wedding_invitation', 'Thiệp');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(
            [
                'name' => 'image',
                'type' => 'image',
                'prefix' => 'img/product/',
            ],
        );
        CRUD::addColumn(
            [
                'label' => 'Thiệp',
                'name' => 'name',
                'type' => 'text',
            ],
        );
        CRUD::addColumn(
            [
                'name' => 'color',
                'label' => 'Màu sắc',
                'type'     => 'closure',
                'function' => function($entry) {
                    $color = ModelColor::where("id",$entry->color)->first();
                    $content = $color["content"];
                    return $content;
                }
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'style',
                'type'     => 'closure',
                'function' => function($entry) {
                    return ModelStyle::where("id",$entry->style)->first()->content;
                }
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'sort',
                'type'     => 'closure',
                'function' => function($entry) {
                    if($entry->sort > 0){
                        return "Xuất hiện ở trang chủ với sort ".$entry;
                    }else{
                        return "Không hiện ở trang chủ";
                    }
                }
            ]
        );
        CRUD::addColumn(
        [
            'name' => 'status',
            'label' => "Hoạt Động",
            'type'  => 'check',
        ]);
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
        CRUD::setValidation(Wedding_invitationRequest::class);

        // CRUD::setFromDb(); // fields
        // CRUD::modifyField('color',["type"=>'relationship']);
        // CRUD::modifyField('style',["type"=>'relationship']);

        CRUD::addField(
            [
                'name' => "image",
                'type' => 'image',
                'aspect_ratio' => 1,
                'label' => 'Hình sản phẩm',
                'prefix' => 'img/product/',
            ],
            
        );
        CRUD::addField(
            [
                'name' => 'name',
                'label' => 'Tên sản phẩm',
                'type' => 'text'
            ],
        );
        CRUD::addField(
            [
                'name' => 'price',
                'label' => 'Giá tiền',
                'type' => 'number'
            ],
        );
        CRUD::addField(
            [
                'label' => 'Màu sắc',
                'name' => 'color',
                'type' => 'relationship',
                'entity' => 'colors', 
                'model' => "App\Models\Color",
                'placeholder' => "Lựa chọn màu",
            ],
        );
        CRUD::addField(
            [
                'label' => 'Kiểu',
                'name' => 'style',
                'type' => 'relationship',
                'entity' => 'styles', 
                'model' => "App\Models\Style",
                'placeholder' => "Lựa chọn kiểu",
            ],
        );
        CRUD::addField(
            [
                'name' => 'sort',
                'type'     => 'number',
                'label' => 'Vị trí sắp xếp (nếu lớn hơn 0 sẽ xuất hiện ở trang chủ và thứ tự sắp xếp theo sort tăng dần)',
            ]
        );
        CRUD::addField(['label'=>"Hoạt Động","name"=>"status",]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }
    // public function store(Wedding_invitationRequest $request)
    // {
    //     // <---------  here is where a before_insert callback logic would be
    //     $response = parent::storeCrud();
    //     dd($response);
    //     // <---------  here is where a after_insert callback logic would be
    //     return $response;
    // }
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
    protected function setupShowOperation(){
        $this->crud->addColumn(            [
            'name' => 'image',
            'type' => 'image',
            'prefix' => 'img/product/',
        ],);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Wedding_invitationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Wedding_invitation as Model;
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
                'prefix' => 'img/',
            ],
            
        );
        CRUD::addColumn(
            [
                'name' => 'code',
                'type' => 'text'
            ],
            
        );
        CRUD::addColumn(
            [
                'name' => 'color',
                'label' => 'Màu sắc',
                'type'     => 'closure',
                'function' => function($entry) {
                    return Model::find($entry->id)->colors()->where("id",$entry->color)->first()->content;
                }
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'kind',
                'label' => 'Kiểu thiệp',
                'type'     => 'closure',
                'function' => function($entry) {
                    return Model::find($entry->id)->kinds()->where("id",$entry->kind)->first()->content;
                }
            ]
        );
        CRUD::addColumn(
            [
                'name' => 'style',
                'type'     => 'closure',
                'function' => function($entry) {
                    return Model::find($entry->id)->styles()->where("id",$entry->style)->first()->content;
                }
            ]
        );
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
                'name' => 'image',
                'type' => 'image',
                'prefix' => 'img/product/',
            ],
            
        );
        CRUD::addField(
            [
                'name' => 'code',
                'type' => 'text'
            ],
        );
        CRUD::addField(
            [
                'name' => 'colors',
                'type' => 'relationship',
                'placeholder' => "Lựa chọn màu",
            ],
        );
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

<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'documentos' => [
        'name' => 'Documentos',
        'index_title' => 'Documentos List',
        'new_title' => 'New Documento',
        'create_title' => 'Create Documento',
        'edit_title' => 'Edit Documento',
        'show_title' => 'Show Documento',
        'inputs' => [
            'path' => 'Path',
            'tipo' => 'Tipo',
            'expediente_id' => 'Expediente',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'nombre' => 'Nombre',
            'email' => 'Email',
            'password' => 'Password',
            'apellido' => 'Apellido',
        ],
    ],

    'expedientes' => [
        'name' => 'Expedientes',
        'index_title' => 'Expedientes List',
        'new_title' => 'New Expediente',
        'create_title' => 'Create Expediente',
        'edit_title' => 'Edit Expediente',
        'show_title' => 'Show Expediente',
        'inputs' => [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'curp' => 'Curp',
            'ine' => 'Ine',
            'domicilio' => 'Domicilio',
            'documento' => 'Documento',
            'beneficiario' => 'Beneficiario',
            'clabe' => 'Clabe',
            'tipo' => 'Tipo',
            'total' => 'Total',
            'user_id' => 'User',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];

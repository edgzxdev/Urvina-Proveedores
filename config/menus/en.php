
<?php
return[
    'menu' => [
        // Navbar items:



        // Sidebar items:
        [
            'type'       => 'sidebar-custom-search',
            'text'       => 'Buscar',         // Placeholder for the underlying input.
            'url'        => 'en/buscar', // The url used to submit the data ('#' by default).
            'method'     => 'post',           // 'get' or 'post' ('get' by default).
            'input_name' => 'searchVal',      // Name for the underlying input ('adminlteSearch' by default).
            'id'         => 'sidebarSearch'   // ID attribute for the underlying input (optional).
        ],
        [
            'text'        => 'home',
            'url'         => 'en/inicio',
            'icon'        => 'fas fa-fw fa-home',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'profile',
            'url'         => 'en/perfil',
            'icon'        => 'fas fa-fw fa-home',
            'icon_color' => 'green',
            'label_color' => 'success',
        ],
        [
            'text'        => 'billing',
            'icon'        => 'fas fa-file-invoice',
            'icon_color' => 'green',
            'label_color' => 'success',
            'submenu' => [
                [
                    'text'  => 'cfact',
                    'url'   => 'en/facturas-list',
                    'icon'  => 'far fa-folder',
                    'shift' => 'ml-4',
                ],
                [
                    'text'  => 'sfact',
                    'url'   => 'en/factura-form',
                    'icon'  => 'far fa-file',
                    'shift' => 'ml-4',
                ],
                [
                    'text'  => 'sfacts',
                    'url'   => 'en/facturas-form',
                    'icon'  => 'far fa-copy',
                    'shift' => 'ml-4',
                ],
                [
                    'text'  => 'szip',
                    'url'   => 'en/zip-form',
                    'icon'  => 'far fa-file-archive',
                    'shift' => 'ml-4',
                ],
            ]
        ],



    ],
]
?>


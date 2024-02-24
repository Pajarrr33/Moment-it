<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    public $register = [
        'username' => [
            'rules' => 'required|alpha_numeric_space|is_unique[user.username]',
            'errors' => [
                'required' => 'Username wajib diisi',
                'alpha_numeric_space' => 'Username hanya boleh mengandung huruf dan angka',
                'is_unique' => 'Username sudah dipakai'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]|alpha_numeric_punct',
            'errors' => [
                'required' => 'Password wajib diisi',
                'min_length' => 'Password harus terdiri dari 8 kata',
                'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ]
        ],
        'password2' => [
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => 'Repeat password wajib diisi',
                'matches' => 'Repeat password tidak cocok'
            ]
        ]
    ];

    public $login = [
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]|alpha_numeric_punct',
            'errors' => [
                'required' => 'Password wajib diisi',
                'min_length' => 'Password harus terdiri dari 8 karakter',
                'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ]
        ]
    ];
    
    public $postingan = [
        'judul' => [
            'rules' => 'required|alpha_numeric_space|max_length[256]',
            'errors' => [
                'required' => 'Judul wajib diisi',
                'alpha_numeric_space' => 'Judul hanya boleh diisi huruf dan angka',
                'max_length' => 'Maksimal 256 Kata'
            ]
        ],
        'deskripsi' => [
            'rules' => 'required|alpha_numeric_space',
            'errors' => [
                'required' => 'Deskripsi wajib diisi',
                'alpha_numeric_space' => 'Deskripsi hanya boleh diisi huruf dan angka',
            ]
        ],
        'tag' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tag wajib diisi',
            ]
        ]
    ];

    public $profile = [
        'username' => [
            'rules' => 'required|alpha_numeric_space',
            'errors' => [
                'required' => 'Username wajib diisi',
                'alpha_numeric_space' => 'Username hanya boleh mengandung huruf dan angka',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ],
        'Bio' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bio wajib ada',
            ]
        ]
    ];

    public $komentar = [
        'komentar' => [
            'rules' => 'required'
        ]
    ];

    public $album = [
        'album_name' => 'required'
    ];
    // --------------------------------------------------------------------
}

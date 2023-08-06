<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\Filter_admin;
use App\Filters\Filter_tendik;
use App\Filters\Filter_dosen;
use App\Filters\Filter_mhs;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'Filter_admin' => Filter_admin::class,
        'Filter_tendik' => Filter_tendik::class,
        'Filter_dosen' => Filter_dosen::class,
        'Filter_mhs' => Filter_mhs::class,

        

    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'Filter_admin' => ['except' => [
                'auth', 'auth/*', '/'
            ]],
            'Filter_tendik' => ['except' => [
                'auth', 'auth/*', '/'
            ]],
            'Filter_dosen' => ['except' => [
                'auth', 'auth/*', '/'
            ]],
            'Filter_mhs' => ['except' => [
                'auth', 'auth/*', '/'
            ]],

        ],
        
        'after' => [
            'Filter_admin' => ['except' => [
                'home', 'home/*',
                'matkul', 'matkul/*',
                'detail_matkul', 'detail_matkul/*',
                'prodi', 'prodi/*',
                'fakultas', 'fakultas/*',
                'ta', 'ta/*',
                'ta_setting', 'ta_setting/*',
                'user', 'user/*',
                'dosen', 'dosen/*',
                'mahasiswa', 'mahasiswa/*',
                'kelas', 'kelas/*',
                'anggota_kelas', 'anggota_kelas/*',
                'jadwal', 'jadwal/*',
                'presensi', 'presensi/*',



            ]],

            'Filter_tendik' => ['except' => [
                'home', 'home/*',
                'matkul', 'matkul/*',
                'detail_matkul', 'detail_matkul/*',
                'prodi', 'prodi/*',
                'fakultas', 'fakultas/*',
                'ta', 'ta/*',
                'ta_setting', 'ta_setting/*',
                'user', 'user/*',
                'dosen', 'dosen/*',
                'mahasiswa', 'mahasiswa/*',
                'kelas', 'kelas/*',
                'anggota_kelas', 'anggota_kelas/*',
                'jadwal', 'jadwal/*',
                'presensi', 'presensi/*',
                'user', 'user/*',



            ]],

            'Filter_dosen' => ['except' => [
                'home', 'home/*',
                //'dosen', 'dosen/*',
                //'mahasiswa', 'mahasiswa/*',
                'kelas', 'kelas/*',
                'anggota_kelas', 'anggota_kelas/*',
                'jadwaldosen', 'jadwaldosen/*',
                'presensi', 'presensi/*',
                'nilai', 'nilai/*',
                'user/*',


            ]],

            'Filter_mhs' => ['except' => [
                'home', 'home/*',
                'jadwalmahasiswa', 'jadwalmahasiswa/*',
                'presensi', 'presensi/*',
                'nilaimhs', 'nilaimhs/*',
                'mahasiswa/*',
                'user/*',
                'khs', 'khs/*',


            ]],


            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}

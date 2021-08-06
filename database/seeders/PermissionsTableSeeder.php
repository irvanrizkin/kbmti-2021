<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_access',
            ],
            [
                'id'    => 18,
                'title' => 'anggotum_create',
            ],
            [
                'id'    => 19,
                'title' => 'anggotum_edit',
            ],
            [
                'id'    => 20,
                'title' => 'anggotum_show',
            ],
            [
                'id'    => 21,
                'title' => 'anggotum_delete',
            ],
            [
                'id'    => 22,
                'title' => 'anggotum_access',
            ],
            [
                'id'    => 23,
                'title' => 'article_create',
            ],
            [
                'id'    => 24,
                'title' => 'article_edit',
            ],
            [
                'id'    => 25,
                'title' => 'article_show',
            ],
            [
                'id'    => 26,
                'title' => 'article_delete',
            ],
            [
                'id'    => 27,
                'title' => 'article_access',
            ],
            [
                'id'    => 28,
                'title' => 'event_create',
            ],
            [
                'id'    => 29,
                'title' => 'event_edit',
            ],
            [
                'id'    => 30,
                'title' => 'event_show',
            ],
            [
                'id'    => 31,
                'title' => 'event_delete',
            ],
            [
                'id'    => 32,
                'title' => 'event_access',
            ],
            [
                'id'    => 33,
                'title' => 'event_registration_create',
            ],
            [
                'id'    => 34,
                'title' => 'event_registration_edit',
            ],
            [
                'id'    => 35,
                'title' => 'event_registration_show',
            ],
            [
                'id'    => 36,
                'title' => 'event_registration_delete',
            ],
            [
                'id'    => 37,
                'title' => 'event_registration_access',
            ],
            [
                'id'    => 38,
                'title' => 'misc_access',
            ],
            [
                'id'    => 39,
                'title' => 'event_field_create',
            ],
            [
                'id'    => 40,
                'title' => 'event_field_edit',
            ],
            [
                'id'    => 41,
                'title' => 'event_field_show',
            ],
            [
                'id'    => 42,
                'title' => 'event_field_delete',
            ],
            [
                'id'    => 43,
                'title' => 'event_field_access',
            ],
            [
                'id'    => 44,
                'title' => 'event_field_response_create',
            ],
            [
                'id'    => 45,
                'title' => 'event_field_response_edit',
            ],
            [
                'id'    => 46,
                'title' => 'event_field_response_show',
            ],
            [
                'id'    => 47,
                'title' => 'event_field_response_delete',
            ],
            [
                'id'    => 48,
                'title' => 'event_field_response_access',
            ],
            [
                'id'    => 49,
                'title' => 'upcoming_proker_create',
            ],
            [
                'id'    => 50,
                'title' => 'upcoming_proker_edit',
            ],
            [
                'id'    => 51,
                'title' => 'upcoming_proker_show',
            ],
            [
                'id'    => 52,
                'title' => 'upcoming_proker_delete',
            ],
            [
                'id'    => 53,
                'title' => 'upcoming_proker_access',
            ],
            [
                'id'    => 54,
                'title' => 'event_field_choice_create',
            ],
            [
                'id'    => 55,
                'title' => 'event_field_choice_edit',
            ],
            [
                'id'    => 56,
                'title' => 'event_field_choice_show',
            ],
            [
                'id'    => 57,
                'title' => 'event_field_choice_delete',
            ],
            [
                'id'    => 58,
                'title' => 'event_field_choice_access',
            ],
            [
                'id'    => 59,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

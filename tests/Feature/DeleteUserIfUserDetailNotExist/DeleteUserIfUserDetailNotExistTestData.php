<?php

declare(strict_types=1);

namespace Tests\Feature\DeleteUserIfUserDetailNotExist;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Tests\Feature\HttpTestDataTrait;

class DeleteUserIfUserDetailNotExistTestData
{
    use HttpTestDataTrait;

    public function revertDeletedUser(): void
    {
        DB::table('users')->updateOrInsert(
            [
                'id' => 2,
                'email' => 'maria@tempmail.com',
                'active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
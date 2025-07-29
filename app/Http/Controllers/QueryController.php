<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function generateQuery500()
    {
        // 200 SELECT Query
        for ($i = 0; $i < 200; $i++) {
            DB::table('users')->inRandomOrder()->first();
            DB::table('posts')->inRandomOrder()->first();
            DB::table('comments')->inRandomOrder()->first();
            DB::table('likes')->inRandomOrder()->first();
            DB::table('friends')->inRandomOrder()->first();
        }

        // 200 INSERT Dummy Comments
        for ($i = 0; $i < 200; $i++) {
            DB::table('comments')->insert([
                'post_id' => DB::table('posts')->inRandomOrder()->value('id'),
                'user_id' => rand(1, 18),
                'comment' => 'dummy_comment_' . $i,
                'created_at' => now(),
                'updated_at' => now(),
                'parent_id' => null,
                'media' => null,
                'media_type' => null
            ]);
        }

        // 100 UPDATE Dummy Comments
        for ($i = 0; $i < 100; $i++) {
            DB::table('comments')
                ->where('comment', 'like', 'dummy_comment%')
                ->inRandomOrder()
                ->limit(1)
                ->update(['updated_at' => now()]);
        }

        return response()->json(['message' => '✅ 500 query berhasil dijalankan sesuai tabel database kamu!']);
    }
}

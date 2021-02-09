<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Photo;

class PhotoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //사진이 없을 때, 에러
    // public function test_throws_error_if_no_photo()
    // {
    //     $response = $this->post('/product', []);
        
    //     $response->assertSessionHasErrors('error');
    // }

    //파일이 스토리지에 저장되었는지 확인 

    // public function test_goes_info_storage()
    // {
    //     $file = UploadedFile::fake()->image('photo2.jpg');

    //     $response = $this -> post('/photo', [
    //         'photo' => $file,
    //     ]);

    //     Storage::assertExists('public/'.$file->hashName());
    // }

    public function test_successful_upload_returns_id_of_newly_created_photo(){
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this -> post('/photo', [
            'photo' => $file,
        ]);

        $response->assertSessionHas('id');
        $response->assertSessionHas('status');

        $photo = Photo::find(session('id'));

        // $this->assertNotNull($photo);
    }
}

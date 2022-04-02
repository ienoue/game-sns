<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 新規登録フォームのバリデーションテスト
     * @dataProvider validationProvider
     */
    public function testValidation(array $keys, array $values, bool $expect)
    {
        //入力項目の配列（$keys）と値の配列($values)から、連想配列を生成する
        $dataList = array_combine($keys, $values);
        $reg = new RegisterController();
        $validator = $reg->validator($dataList);
        $result = $validator->passes();
        //期待値($expect)と結果($result)を比較
        $this->assertEquals($expect, $result);
    }

    public function validationProvider()
    {
        return [
            '名前OK' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['あa亜ア 　ー・', 'test@example.com', 'password', 'password'],
                true
            ],
            '名前必須エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                [null, 'test@example.com', 'password', 'password'],
                false
            ],
            '名前形式エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                [1, 'test@example.com', 'password', 'password'],
                false
            ],
            '名前最大文字数エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                [str_repeat('a', 256), 'test@example.com', 'password', 'password'],
                false
            ],
            '名前最大文字数OK' => [
                ['name', 'email', 'password', 'password_confirmation'],
                [str_repeat('a', 255), 'test@example.com', 'password', 'password'],
                true
            ],
            '名前文字形式不正エラー/' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['/', 'test@example.com', 'password', 'password'],
                false
            ],
            '名前文字形式不正エラー:' => [
                ['name', 'email', 'password', 'password_confirmation'],
                [':', 'test@example.com', 'password', 'password'],
                false
            ],
            '名前文字形式不正エラー?' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['?', 'test@example.com', 'password', 'password'],
                false
            ],
            'email必須エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', null, 'password', 'password'],
                false
            ],
            'email形式エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@example.', 'password', 'password'],
                false
            ],
            'email形式エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@test', 'password', 'password'],
                false
            ],
            'email形式エラー日本語' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'あああ@example', 'password', 'password'],
                false
            ],
            'email最大文字数エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', str_repeat('a', 255) . '@example.com', 'password', 'password'],
                false
            ],
            'password必須エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@example.com', '', ''],
                false
            ],
            'password最小文字数エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@example.com', 'pass', 'pass'],
                false
            ],
            'password一致エラー' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@example.com', 'password', 'password1'],
                false
            ],
        ];
    }
}

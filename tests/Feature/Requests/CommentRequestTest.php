<?php

namespace Tests\Feature\Requests;

use App\Http\Requests\CommentRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CommentRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * コメントのバリデーションテスト
     * @dataProvider validationProvider
     */
    public function testValidation(array $keys, array $values, bool $expect)
    {
        //入力項目の配列（$keys）と値の配列($values)から、連想配列を生成する
        $dataList = array_combine($keys, $values);
        $request = new CommentRequest();
        $rules = $request->rules();
        $validator = Validator::make($dataList, $rules);
        $result = $validator->passes();
        //期待値($expect)と結果($result)を比較
        $this->assertEquals($expect, $result);
    }

    public function validationProvider()
    {
        return [
            'OK' => [
                ['text'],
                ['あa亜ア 　ー・/'],
                true
            ],
            'コメント必須エラー' => [
                ['text'],
                [null],
                false
            ],
            'コメント最大文字数OK' => [
                ['text'],
                [str_repeat('あ', 300)],
                true
            ],
            'コメント最大文字数エラー' => [
                ['text'],
                [str_repeat('あ', 301)],
                false
            ],
            'コメント形式エラー' => [
                ['text'],
                [1],
                false
            ],
        ];
    }
}

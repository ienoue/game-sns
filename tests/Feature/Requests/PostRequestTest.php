<?php

namespace Tests\Feature\Requests;

use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PostRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 投稿内容のバリデーションテスト
     * @dataProvider validationProvider
     */
    public function testValidation(array $keys, array $values, bool $expect)
    {
        //入力項目の配列（$keys）と値の配列($values)から、連想配列を生成する
        $dataList = array_combine($keys, $values);
        $request = new PostRequest();
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
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                true
            ],
            '本文最大文字数エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    str_repeat('あ', 301),
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                false
            ],
            '本文最大文字数OK' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    str_repeat('あ', 300),
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                true
            ],
            '本文必須エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    null,
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                false
            ],
            '本文形式エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    1,
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                false
            ],
            'タグ形式エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    'test',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                false
            ],
            'タグNull OK' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    null,
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                true
            ],
            'タグ配列最大文字数エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => str_repeat('あ', 21)], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                false
            ],
            'タグ配列最大文字数OK' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => str_repeat('あ', 20)], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                true
            ],
            'タグ配列最大数エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1'], ['value' => 'test2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5'], ['value' => 'test6']],
                ],
                false
            ],
            'タグ配列文字形式エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'te st1'], ['value' => 'tes　t2'], ['value' => 'test3'], ['value' => 'test4'], ['value' => 'test5']],
                ],
                false
            ],
            'タグ配列配列形式エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 'test1', 'err' => 'err'], ['value' => 'test2']],
                ],
                false
            ],
            'タグ配列型形式エラー' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    [['value' => 1], ['value' => 2], ['value' => 3], ['value' => 4], ['value' => 5]],
                ],
                false
            ],
            'タグ配列Null OK' => [
                ['text', 'tags', 'tags_as_array'],
                [
                    'test',
                    '[{"value":"test1"},{"value":"test2"},{"value":"test3"},{"value":"test4"},{"value":"test5"}]',
                    null,
                ],
                true
            ],
        ];
    }
}

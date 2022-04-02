<?php

namespace Tests\Feature\Requests;

use App\Http\Requests\SearchRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SearchRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * タグ絞り込みのバリデーションテスト
     * @dataProvider validationProvider
     */
    public function testValidation(array $keys, array $values, bool $expect)
    {
        //入力項目の配列（$keys）と値の配列($values)から、連想配列を生成する
        $dataList = array_combine($keys, $values);
        $request = new SearchRequest();
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
                ['tag'],
                ['あa亜ア 　ー・/'],
                true
            ],
            'タグ必須エラー' => [
                ['tag'],
                [null],
                false
            ],
        ];
    }
}

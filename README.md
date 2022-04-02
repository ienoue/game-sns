# アプリケーション名
Gachat

	
# アプリケーション概要
SNS + ソシャゲ


# URL
http://g4chat.herokuapp.com/

# テスト用アカウント
メールアドレス: test@test.com  
パスワード: hogehoge


# 利用方法
* トップページで新規投稿が行えます。投稿は編集・削除が可能です。
* 他のユーザをフォローしたり、いいねが出来ます。
* いいねを押すと自動的に相手と対戦を行います。
* ガチャは1日に3回引くことが出来ます。


# 目指した課題解決
SNSを使ってもなかなか人と繋がれない、SNSでいいねが貰えないという悩みがありました。  
そこで、いいねを押すと押した相手のモンスターと自動で対戦をする機能を搭載する事により、  
いいねを積極的に押したくなり、より多くの人と繋がることが出来るのではないかと思い作成しました。  
また、1日に3回ガチャを引くことが出来るので毎日ログインするようになり、定着率が向上します。


# 使用技術
* PHP 8.0.13
* Laravel 8.83.4
* MariaDB 10.4.22
* jQuery 3.6.0
* Tagify 4.9.8
* Bootstrap: 5.1.3


# 機能一覧
* ユーザ登録・ログイン機能
* 記事投稿機能
* 記事削除・更新機能(Ajax)
* いいね機能(Ajax)
* フォロー機能(Ajax)
* タグ登録・タグ絞り込み記事表示機能
* ページネーション機能
* マイページ（投稿・いいね・フォロー・フォロワーの一覧）
* Eagerロードによるクエリ発行回数の削減
* ユニットテスト


# 実装予定の機能
* ガチャ機能
* いいね時に自動対戦機能
* 対戦履歴・モンスター一覧表示機能

# ER図
![ER図](https://user-images.githubusercontent.com/39022092/161370612-2a6003a1-b983-40f5-b0ad-add412cf320a.png)
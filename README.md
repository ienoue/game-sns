# アプリケーション名

Gachat

# アプリケーション概要

SNS + ソシャゲ

# URL

<http://g4chat.herokuapp.com/>

# テスト用アカウント

ナビゲーションバーから簡単ゲストログインが可能です  
メールアドレス: test@test.com  
パスワード: hogehoge  

# 利用方法

* トップページで新規投稿が行えます。投稿は編集・削除・タグ付けが可能です。
* 他のユーザをフォローしたり、いいね、コメントが出来ます。
* モンスターが手に入るガチャを1日に特定の回数だけ引くことが出来ます。
* マイページの所持モンスターの一覧から相棒モンスターを設定出来ます。
* いいねを押すと相手の相棒モンスターとの対戦を自動的に行います。
* 対戦に勝利した場合は、次の日のガチャでレア以上が確定します。

# 目指した課題解決

SNSを使ってもなかなか人と繋がれない、SNSでいいねが貰えないという悩みがありました。  
そこで、**いいねを押すと押した相手のモンスターと自動で対戦をする機能**を搭載する事にしました。  
狙いとしては、いいねを積極的に押したくなり、より多くの人と繋がれることを目指しています。  
また、1日にガチャを引くことが出来る回数を制限したり、次の日レア以上確定ガチャにより、サイトへの定着を促します。

# 使用技術

* PHP 8.0.13
* Laravel 8.83.4
* MySQL(MariaDB)
* jQuery 3.6.0
* Tagify 4.9.8
* Bootstrap: 5.1.3

# 機能一覧

* ユーザ登録・ログイン機能
* 記事投稿機能
* 記事削除・更新機能(Ajax)
* コメント機能
* いいね機能(Ajax)
* フォロー機能(Ajax)
* タグ登録・タグ絞り込み記事表示機能
* ガチャ機能
* 相棒モンスター設定機能(Ajax)
* 対戦機能(Ajax)
* ページネーション機能
* 所持モンスターのソート機能
* マイページ（投稿・いいね・コメント・フォロー・対戦・所持モンスターの一覧）
* Eagerロードによるクエリ発行回数の削減
* 連続投稿防止機能
* ユニットテスト

# 制作期間

１ヶ月半

# ER図

![ER図](https://user-images.githubusercontent.com/39022092/165082933-92e933ff-e4f3-4eae-a5fa-27c0044d5260.png)


# ワイヤーフレーム

![ワイヤーフレーム](https://user-images.githubusercontent.com/39022092/163780744-cda0427f-8134-4351-a729-83e83f14897e.png)

# 学習に使用した教材

* PHP
  * [気づけばプロ並みPHP 改訂版](https://www.ric.co.jp/book/programming/detail/192)
  * [独習PHP 第4版](https://www.shoeisha.co.jp/book/detail/9784798168494)
* Lravel
  * [PHPフレームワーク Laravel入門 第2版](https://www.shuwasystem.co.jp/book/9784798060996.html)
  * [PHPからLaravelまで サーバーサイドをとことんやってみよう【初心者から脱初心者へ】【わかりやすさ最重視】](https://www.udemy.com/course/phpbeginnertolaravel/)
  * [【作って学ぶ】laravel8とMySQLで作るシンプルメモアプリ](https://www.udemy.com/course/laravel8mysql/)
  * [（ミニ）ブログを作りながら、Laravel 中級者を目指そう！](https://www.udemy.com/course/laravel-blog/)
* HTML・CSS
  * [1冊ですべて身につくHTML & CSSとWebデザイン入門講座](https://www.sbcr.jp/product/4797398892/)
  * [教科書では教えてくれないHTML&CSS](https://direct.gihyo.jp/view/item/000000001556)
  * [Bootstrap 5 フロントエンド開発の教科書](https://gihyo.jp/dp/ebook/2021/978-4-297-12491-5)
* JavaScript
  * [確かな力が身につくJavaScript「超」入門 第2版](https://www.sbcr.jp/product/4815601577/)
  * [JavaScript: The Good Parts](https://www.oreilly.co.jp/books/9784873113913/)
  * [JavaScript Primer](https://jsprimer.net/)
  * [速習＋詳細＋実例 jQuery講座](https://www.udemy.com/course/jquery-kouza/)
* SQL
  * [SQL 第2版 ゼロからはじめるデータベース操作](https://www.shoeisha.co.jp/book/detail/9784798144450)
* Git
  * [Git： もう怖くないGit！チーム開発で必要なGitを完全マスター](https://www.udemy.com/course/unscared_git/)
* Linux
  * [もう怖くないLinuxコマンド。手を動かしながらLinuxコマンドラインを5日間で身に付けよう](https://www.udemy.com/course/unscared_linux/)

# 投稿記事

https://qiita.com/ienoue
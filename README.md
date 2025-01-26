# 20241218_itoukouki_furima_app_test
フリマアプリ

環境構築
Dockerビルド
1. git cloneリンク
2. docker-compose up -d --build

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて
docker-compose.ymlファイルを編集してください

Laravel環境構築

    1. docker-compose exec php bash
    2. composer install
    3. env.exampleファイルから.envを作成し、環境変数を変更
    4. php artisan key:generate
    5. php artisan migrate
    6. php artisan db:seed
    7. php artisan storage:link
    8. storage/app/publicの下に「item_img」「profile_img」というディレクトリを作成すること
    ※seederファイルは誤作動しないようにコメント化してあるためコメントを外してください

使用技術

・PHP 7.4.9
・Laravel 8.83.29
・MySQL 8.0.26

ER図
・er.dio参照
・シートにスクリーンショット記載


URL

・開発環境 : http://localhost/
・phpMyAdmin : http://localhost:8080/

注意点
・画像をアップロードする際は2M以内の画像をアップロードしてください
　アップロード可能なメモリ容量の増やす設定をphp.iniに記載してありますが、反映されていないためです。
　また、2Mより大きい画像をアップロードするとエラーメッセージが表示されるようにバリデーションは施してあります
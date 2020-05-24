# アプリケーション名

備蓄アプリ

## アプリケーションURL

https://bitiku.herokuapp.com/

- E-Mail_Address:bbb@bbb.com
- Password:12345678

## アプリケーションの説明

備蓄品の賞味期限を管理するアプリです。
備蓄品の名前、賞味期限、在庫数、簡単なメモが登録でき、賞味期限を入力すると残りの日数が表示されます。

## 現在の機能

- ユーザー登録、ログイン機能
- 備蓄品の登録、一覧、詳細、編集、削除、チェックボックスによる複数削除
- 賞味期限までの日数の表示
- 備蓄品名の検索機能

## 今後の実装したい機能

- 画像の投稿。その画像をリストで確認ができるようにしたいです。
- 賞味期限が近いもの順に並び替えれるようにしたいです。

## DB設計

![er図](https://user-images.githubusercontent.com/56705907/82758348-f680ce00-9e20-11ea-9f4c-d25254735acc.png)

## デモ
- 一覧ページ
![screencapture-bitiku-herokuapp-user-show-21-2020-05-25-00_58_27](https://user-images.githubusercontent.com/56705907/82758699-11544200-9e23-11ea-8ad4-8c67b6c78762.png)

## 使い方

1. ログイン後に/user/show/idに飛びます。
2. 登録ボタンから、備蓄品の名前、賞味期限、在庫、カテゴリー選択、メモを登録します。
3. 登録すると、名前、賞味期限、在庫、残り日数がリストで確認できます。
もし、賞味期限が本日の場合は文字の色が赤で表示されます。もし賞味期限過ぎていたら背景がグレーで表示されます。
4. 検索で備蓄品の名前を検索することができます。検索後に、一覧をクリックすると元の画面に戻ります。
5. チェックボックスによる複数削除ができます。チェック後に赤い×ボタンをクリックするとconfirmで確認してokなら削除します。
6. 詳細・編集ができます。オレンジ色の＞ボタンをクリックすると詳細ページで登録した備蓄品の確認ができます。
さらにオレンジ色の編集＞ボタンをクリックすると編集ページで登録内容の編集ができます。編集ページでも削除ができます。

## 制作した理由

コロナウィルスの影響でカップ麺など備蓄品を買うようになり、賞味期限を管理できれば便利だと思い制作しました。

## ツール・ライブラリの名前

- Laravel 5.8.38
- PHP 7.1.23
- JavaScript
- html
- scss
- bootstrap 4.0.0
 
## デプロイ
- Heroku

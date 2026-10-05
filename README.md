# SNSアプリ（Laravel）

Laravelで作ったシンプルなSNSアプリです。  
投稿・いいね・コメント・プロフィール編集など、基本的な機能を実装しています。

## 主な機能
- 投稿（画像対応）
- 投稿編集 / 削除
- いいね機能
- コメント機能
- プロフィール編集（名前・自己紹介・アイコン）
- タイムライン表示
- ページネーション

## 使用技術
- Laravel 10
- Breeze
- Tailwind CSS
- MySQL

## セットアップ方法
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

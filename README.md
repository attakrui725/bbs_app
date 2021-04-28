# Usage
このアプリの使い方

```bash
 git clone https://github.com/attakrui725/bbs_app.git
cd sample
docker-compose up -d
docker-compose exec php-fpm bash
php artisan db:seed
```

## 管理者
email:admin@example.com
password:1111aaaa

## ユーザー
email:user@example.com
password:2222bbbb


# README
# users
| Column   | Type   | Options     |
| -------- | ------ | ----------- |
| name     | string | null: false |
| email    | string | null: false |
| password | string | null: false |
| role     | int    | null: false |

### Association
- has_many :posts


# posts

| Column  | Type       | Options                       |
| ------- | ---------- | ----------------------------- |
| subject | string     | null: false                   |
| message | text       | null: false                   |
| name    | string     | null: false                   |
| user_id | references | null: false,foreign_key: true |

### Association
- has_many :comments
- belongs_to :user


# commemts

| Column  | Type       | Options                       |
| ------- | ---------- | ----------------------------- |
| name    | string     | null: false                   |
| comment | text       | null: false                   |
| post_id | references | null: false,foreign_key: true |
|         |

### Association
- belongs_to :post

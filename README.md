## クローンの手順

1. プロジェクト用のリポジトリを GitHub で作成。
1. GitHub のリポジトリから URL を取得
   `git@github.com:NOBUo1967/lamp-docker.git`
1. リポジトリをクローンする

```sh
git clone git@github.com:NOBUo1967/lamp-docker.git [新しいプロジェクト名]
```

1. リモートリポジトリの URL を変更する

```sh
cd [新しいプロジェクト]
git remote set-url origin [1.で作成したリモートリポジトリのURL]
git remote -v # リモートリポジトリのURL
git push origin main # リモートリポジトリにプッシュ
```

## Docker-compose の設定変更

compose.yaml の記述を変更する。

```yaml
services:
  app:
    # 略

  db:
    # 略
    volumes:
      - type: volume
        source: # 新しいプロジェクトのボリューム
        target: /var/lib/mysql
      # - type: bind
      #   source: ./config/my.cnf
      #   target: /etc/mysql/conf.d/my.cnf
      - type: bind
        source: ./docker/db/init
        target: /docker-entrypoint-initdb.d
    image: mysql:5.7

volumes:

  # 新しいプロジェクトのボリューム
```

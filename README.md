# 概要
標準入力に対応したコーディングテスト用の環境の構築

Vscodeの拡張機能で、`PHP Debug`をインストールする必要がある

## コマンドライン
```sh
docker exec web php ファイルpath&ファイル名 標準入力値を入力

# 例 docker exec web php index.php test1 test2 test3
# 今回の環境では、例の方法で入力できる
```

## launch.jsonのpathMappingsについて理解した内容
`自分なりに理解した内容のメモ(間違っている部分もかなりあるので、あまり参考にならないです)`

- `${workspaceRoot}`は、ルートディレクトリを意味している。今回の場合だと、docker-compose.ymlがあるファイルがルートディレクトリとなる
- 今回のdockerで作成した仮想環境は、`var/www/html`のディレクトリー内に、`index.php`のファイルのみが格納されている。デバッグするファイルを指定する必要がある為、`pathMappings` のpathに`${workspaceRoot}/src`と追記する必要がある
- `Xdebug v3`の場合は、portを9003番に設定する必要がある。`Xdebug v2`の場合は、9000番のportを使用する
- `PHP Debug`をインストールした事で、launch.jsonの設定を行えば、Visual Studio CodeがDockerコンテナに接続してくれる

```json
"pathMappings": {
        // 仮想環境のpath: ローカル環境のpath
        "/var/www/html": "${workspaceRoot}/src"
    }
```

# 参考資料
## 環境構築関連
- [Xdebug徹底解説！環境ごとの設定方法から仕組みまでどこよりも詳しく解説します](https://www.membersedge.co.jp/blog/php-xdebug/)
- [【Xdebug】Docker+PHP+VSCodeでデバッグする方法](https://ichi-station.com/php-xdebug-vscode-docker/)
- [VSCode + Docker + XdebugでPHPのデバッグ環境を構築](https://kitigai.hatenablog.com/entry/2019/05/04/165522)
- [Compose sample application](https://github.com/docker/awesome-compose/tree/master/apache-php)
- [Xdebug3系の設定例](https://blog.junpeko.com/xdebug-3-setting)
- [[公式]コンテナからホスト上のサービスに対して接続したい](https://docs.docker.jp/v19.03/docker-for-mac/networking.html#mac-i-want-to-connect-from-a-container-to-a-service-on-the-host)
- [Xdebug3系の設定例](https://blog.junpeko.com/xdebug-3-setting)

## コマンドライン関連
- [コマンドラインオプション](https://www.php.net/manual/ja/features.commandline.options.php)

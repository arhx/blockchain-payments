## Установка пакета

```bash
composer require arhx/blockchain-payments
```

### Публикация файлов
* controller
* model
* routes
* view
* migrations
* config
```bash
php artisan blockchain-payments:publish
```

### Настройки
Необходимо прописать в *.env* файле две переменные
* BLOCKCHAIN_XPUB - это xPub который можно узнать в настройках адресов вашего BTC кошелька на blockchain.info
* BLOCKCHAIN_API_KEY - это ключ от Blockchain.info API, получить его можно тут https://api.blockchain.info/customer/signup
```text
BLOCKCHAIN_XPUB=
BLOCKCHAIN_API_KEY=
```

### Интеграция с сайтом
Вы можете перенаправить пользователя на страницу генерации адреса оплаты кодом ниже, данная страница покажет пользователю сколько и куда ему необходимо отправить BTC для получения запрошенной суммы
```php
$replenishment_via_blockchain = true;
if($replenishment_via_blockchain){
    return redirect()->route('blockchain-pay', ['amount'=> 100 ]);
}
```
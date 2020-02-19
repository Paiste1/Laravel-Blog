# скачал лару

# в веб.пхп настроил бд

# создаем модель и миграцию

# связываем таблицу user.id и post.author_id в таблице post ( $table->foreign('author_id')->references('id')->on('users'); )

# делаем миграцию
    - ( если вылезла ошибка идем в app/Providers/AppServiceProviser.php и в boot добавляем use Illuminate\Support\Facades\Schema; прописываем Schema::defaultStringLength(191);
    - после перезапускаем миграцию php artisan migrate:fresh  в строке $table->bigInteger('author_id')->unsigned(); делаем так, число должно быть больше нуля; затем снова делаем fresh; )
    - (если не получилось то, сначала проводим основную миграцию, а потом с post )

# прописываем php artisan make:factory PostFactory --model=Post     чтобы заполнить таблицу случайными значениями (database/factories)

# после тoго как написали идем в database/seeds/databaseseeder@run при миграции стучимся сюда и спрашиваем, надо ли заполняь чем то таблицы (по умолчанию закоменчено)

# далее чистим миграции и заполняем новыми данными php artisan migrate --seed

# создаем контроллер PostController после создал view posts и в ней файл index

# далее идем в веб.пхп и вызываем наш постконтроллер-индекс

# подключил бутстрап и в линк {{ asset('css/app.css') }} подредактировал страницу индекс

# удаляем старый постконтроллер и прописываем ресурсный контроллер (добавлени, удаление, просмотр и тд)
    php artisan make:controller PostController -r

# работаем с контроллером

# создаем стили public/css/style.css

# добавляем реквест в индексконтроллер и делаем поиск далее делаем все в форме (action и name для инпута)

<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'yangi' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'qayumov9449' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'J?LKuA>eu+I# ;[WK6*1D<dCvFO&eFft}0hrShp}c}m?c}vJh; @bZYnS7pWAx^B' );
define( 'SECURE_AUTH_KEY',  '{34cjZ!t*Wo)FnTv!3]#ew[8[r*I|#[B*8W+ wpDG3vHWyqJVoU,a8mKh8X>>I.:' );
define( 'LOGGED_IN_KEY',    'k`erj@xA@f~dho7zt@WgY8lkp(Cf_p)2k:{LSRBrkh?D>E_y%g~FX*etu$OxR&A>' );
define( 'NONCE_KEY',        'qdZ3t{a14|ZSSw%!G0Km#0^1b%PM(o((:i4&Qk6[cF)?t-i{)3bG3^xX-(4|6wnJ' );
define( 'AUTH_SALT',        ' ;ycUg`SO>5[4Qlzi[lV^0J8{;oL0f&>sijC[}24{`eK`OyS2I(TDrBIM!RG>gbO' );
define( 'SECURE_AUTH_SALT', 'sm=_*L[:67TxQy-`fF}#I3f05x8YJ^;e`#+}jd1K^a?yfuE=aku %9NM.=H!D7q{' );
define( 'LOGGED_IN_SALT',   '49![8Z*s:ug6SX$t#qo[6^kM/VJ (L*PJf8|K:hls~t)I=Y`Zw;A1QFwtw4f,%7j' );
define( 'NONCE_SALT',       'X,^qnOUv3wJ~2MuNFl5$[{ Y43p4EGW`hF0j`rzf:E)1cu*m%O*6W%[u=M4X:Cv^' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

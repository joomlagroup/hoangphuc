<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt,
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'hoangphuc' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z #{k+#!|H;pC*,fK)</Elf^T+z[4x~@E-$lstrw!k@7)!n&=ofm[kL)3ZAZiuQz' );
define( 'SECURE_AUTH_KEY',  ';ai?[L [G? MLy6-*K*+N,Frvh$A>-R_.i*zYfUPuSO~UVSsvDt{~,1G4H0R7K 3' );
define( 'LOGGED_IN_KEY',    'RvH)~RZ3xs;$RYgr .b-3lH759&Pg4hKfrc$VjjPeR:~a9jfvZTu~hamm&q6U}>}' );
define( 'NONCE_KEY',        'N&>1fYCcD[(_uNW$KdJpp`2xwAgLUKm5f7Z]Tq03^&{t:|Ptyzlc>8&UcnI,y}q%' );
define( 'AUTH_SALT',        '5RE<LuHl[QC9dHZQ!%);5bm<l8+q]ux5Pin.@H4naR(t JO|=n*xywed%*<4cVQj' );
define( 'SECURE_AUTH_SALT', '{K5<-)zD1*tDe|n q>`%ZA)oTO>bVk9AB6l*64y7tWR__ppZh@Zt*..G&S_Rl?OO' );
define( 'LOGGED_IN_SALT',   'PY}E M^h7F?T7Y[c1gIfqz0P0I]}(L]>/2nHfpKX:oH)^}`vP /#sOz@2FVP$@cX' );
define( 'NONCE_SALT',       'tLy$O#i^)B;vo5#NnSbrZ7hKu&Gs<K_bPdIE8ibg}/b>_{5fks&B0BPiCRX ~DAJ' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'mp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

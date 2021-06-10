# Project-Academy-Hsoub.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
## موقع شركة
Modde By : Mansour Ahmed (@mansour_tech)
<hr>
الشيفرة المصدرية الخاصة بتطوير موقع شركة 

## خطوات التثبيت

- **[composer install]**
- **[php artisan migrate]**
- **[php artisan db:seed]**
- **[php artisan key:generate]**
- **[php artisan storage:link]**
- **[npm install]**
- **[npm run dev]**
- **[php artisan serve]**


## لدخول لإدارة الموقع 
<p>لدخول لإدارة الموقع يجب إنشاء حساب من ثم إنتقال الى قاعدة البيانات من ثم جدول المستخدمين وتغير الحقل 
(Role)
من 2 الى 1
</p>


<p>من ثم إذهب الى موقع سيظهر لك خيار إدارة الموقع  عند النقر على القائمة المنسدلة</p>

<h1>لتجربة عملية النشرة البريدية عبر البريد الإلكتروني، اضبط الإعدادات في ملف env بالشكل التالي:</h1>
<hr>
<li>سجل في الموقع https://mailtrap.io لمحاكاة إرسال البريد</li>
<li>انتقل إلى https://mailtrap.io/inboxes/ ثم Demo inbox</li>
<li>انسخ اسم المستخدم وكلمة المرور إلى ملف env لتصبح الإعدادات كالتالي</li>

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=username
MAIL_PASSWORD=password

او بواسطة log

MAIL_DRIVER=log

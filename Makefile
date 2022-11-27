start :
	php artisan cache:clear
	php artisan config:clear
	php artisan serve --host 0.0.0.0 --port 80

controller :
	php artisan make:controller $(name)